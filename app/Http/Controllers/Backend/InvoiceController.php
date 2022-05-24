<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customers;
use App\Models\Unit;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Payment;
use App\Models\PaymentDetails;
use Illuminate\Support\Facades\DB;
use PDF;

class InvoiceController extends Controller
{
    public function view()
    {
        $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.invoice.view-invoice', compact('allData'));
    }

    public function add()
    {
        $data['category'] = Category::all();
        $invoice_data = Invoice::orderBy('id', 'desc')->first();
        if ($invoice_data == NULL) {
            $firstReg = '0';
            $data['invoice_no'] = $firstReg + 1;
        } else {
            $invoice_data = Invoice::orderBy('id', 'desc')->first()->invoice_no;
            $data['invoice_no'] = $invoice_data + 1;
        }
        $data['customers'] = Customers::all();
        $data['date'] = date('Y-m-d');

        return view('backend.invoice.add-invoice', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->category_id == NULL) {
            $notification = array(
                'message' => 'Sorry! You do not select any item',
                'alert-type' => 'error'
            );
            return  redirect()->back()->with($notification);
        } else {
            if ($request->paid_amount > $request->estimated_amount) {
                $notification = array(
                    'message' => 'Sorry! Paid Amount is maximum the total price',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } else {
                $invoice = new Invoice();
                $invoice->invoice_no = $request->invoice_no;
                $invoice->date      = date('Y-m-d', strtotime($request->date));
                $invoice->description = $request->description;
                $invoice->status = 0;
                $invoice->created_by = Auth::user()->id;
                DB::transaction(function () use ($request, $invoice) {
                    if ($invoice->save()) {
                        $count_category = count($request->category_id);
                        for ($i = 0; $i < $count_category; $i++) {
                            $invoice_details = new InvoiceDetails();
                            $invoice_details->date = date('Y-m-d', strtotime($request->date));
                            $invoice_details->invoice_id = $invoice->id;
                            $invoice_details->category_id = $request->category_id[$i];
                            $invoice_details->product_id = $request->product_id[$i];
                            $invoice_details->selling_qty = $request->selling_qty[$i];
                            $invoice_details->unit_price = $request->unit_price[$i];
                            $invoice_details->selling_price = $request->selling_price[$i];
                            $invoice_details->status = 1;
                            $invoice_details->save();
                        }
                        if ($request->customer_id == "0") {
                            $customer = new Customers();
                            $customer->name = $request->name;
                            $customer->mobile = $request->mobile;
                            $customer->address = $request->address;
                            $customer->save();
                            $customer_id = $customer->id;
                        } else {
                            $customer_id = $request->customer_id;
                        }
                        $payment = new Payment();
                        $payment_details = new PaymentDetails();
                        $payment->invoice_id = $invoice->id;
                        $payment->customer_id = $customer_id;
                        $payment->paid_status = $request->paid_status;
                        $payment->discount_amount = $request->discount_amount;
                        $payment->total_amount = $request->estimated_amount;
                        if ($request->paid_status == 'full_paid') {
                            $payment->paid_amount = $request->estimated_amount;
                            $payment->due_amount = '0';
                            $payment_details->current_paid_amount = $request->estimated_amount;
                        } elseif ($request->paid_status == 'full_due') {
                            $payment->paid_amount = '0';
                            $payment->due_amount = $request->estimated_amount;
                            $payment_details->current_paid_amount = 0;
                        } elseif ($request->paid_status == 'partial_paid') {
                            $payment->paid_amount = $request->paid_amount;
                            $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                            $payment_details->current_paid_amount = $request->paid_amount;
                        }
                        $payment->save();
                        $payment_details->invoice_id = $invoice->id;
                        $payment_details->date = date('Y-m-d', strtotime($request->date));
                        $payment_details->save();
                    }
                });
            }
        }
        $notification = array(
            'message' => 'invoice item successfully added',
            'alert-type' => 'success'
        );
        return  redirect()->route('invoice.pending.list')->with($notification);
    }
    // public function edit($id)
    // {
    //     $data['editData'] = Purchase::find($id);
    //     $data['supplier'] = Supplier::all();
    //     $data['category'] = Category::all();
    //     $data['unit'] = Unit::all();
    //     return view('backend.purchase.edit-purchase', $data);
    // }

    public function update(Request $request, $id)
    {
        $data = Purchase::find($id);
        $data->created_by = Auth::user()->id;
        $data->name = $request->name;
        $data->supplier_id = $request->supplier_id;
        $data->category_id = $request->category_id;
        $data->unit_id = $request->unit_id;
        $data->quantity = '0';
        $data->save();
        $notification = array(
            'message' => 'purchase Data Update Successfully',
            'alert-type' => 'success'
        );
        return  redirect()->route('purchase.view')->with($notification);
    }
    public function delete($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        InvoiceDetails::where('invoice_id', $invoice->id)->delete();
        Payment::where('invoice_id', $invoice->id)->delete();
        PaymentDetails::where('invoice_id', $invoice->id)->delete();
        $notification = array(
            'message' => 'invoice Deleted Successfully',
            'alert-type' => 'success'
        );
        return  redirect()->route('invoice.pending.list')->with($notification);
    }
    public function pendinglist()
    {
        $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0')->get();
        return view('backend.invoice.pending-invoice-list', compact('allData'));
    }
    public function approve($id)
    {
        $invoice = Invoice::with(['invoice_details'])->find($id);
        return  view('backend.invoice.approve-invoice', compact('invoice'));
    }
    public function approvestore(Request  $request, $id)
    {
        foreach ($request->selling_qty as $key => $val) {
            $invoice_details = InvoiceDetails::where('id', $key)->first();
            $product = Product::where('id', $invoice_details->product_id)->first();
            if ($product->quantity < $request->selling_qty[$key]) {
                $notification = array(
                    'message' => 'Sorry You are Approve maximum value',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
        $invoice = Invoice::find($id);
        $invoice->approved_by = Auth::user()->id;
        $invoice->status = '1';
        DB::transaction(function () use ($request, $invoice, $id) {
            foreach ($request->selling_qty as $key => $val) {
                $invoice_details = InvoiceDetails::where('id', $key)->first();
                $product = Product::where('id', $invoice_details->product_id)->first();
                $product->quantity = ((float)$product->quantity) - ((float)$request->selling_qty[$key]);
                $product->save();
            }
            $invoice->save();
        });
        $notification = array(
            'message' => 'Invoice Successfully Approved',
            'alert-type' => 'success'
        );
        return redirect()->route('invoice.pending.list')->with($notification);
    }
    public function invoiceprintlist()
    {
        $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.invoice.pos-invoice-list', compact('allData'));
    }
    public function invoiceprint($id)
    {
        $data['invoice'] = Invoice::with(['invoice_details'])->find($id);
        $pdf = PDF::loadView('backend.pdf.invoice-pdf', $data);
        return $pdf->download('document.pdf');
    }
}
