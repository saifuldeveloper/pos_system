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

class InvoiceController extends Controller
{
    public function view()
    {
        $allData = Invoice::orderBy('date','desc')->get();
        // $data['allData']=purchase::all();
        // return view('backend.purchase.view-purchase',$data);
        return view('backend.invoice.view-invoice', compact('allData'));
    }

    public function add()
    {
        $data['category'] = Category::all();
        $invoice_data=Invoice::orderBy('id','desc')->first();
        if($invoice_data==NULL){
            $firstReg ='0';
            $data['invoice_no']=$firstReg+1;
        }else{
            $invoice_data=Invoice::orderBy('id','desc')->first()->invoice_no;
            $data['invoice_no']=$invoice_data+1;

        }
        $data['customers']=Customers::all();
        return view('backend.invoice.add-invoice', $data);
    }

    public function store(Request $request)
    {

        if ($request->category_id == NULL) {
            $notification = array(
                'message' => 'Sorry! You do not select any item',
                'alert-type' => 'danger'
            );
            return  redirect()->back()->with($notification);
        } else {
            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date  = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->created_by = Auth::user()->id;
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->status  = '0';
                $purchase->save();
            }
        }
        $notification = array(
            'message' => 'Data save successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('purchase.view')->with($notification);
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
        $purchase = Purchase::find($id);
        $purchase->delete();
        $notification = array(
            'message' => 'purchase Deleted Successfully',
            'alert-type' => 'error'
        );

        return  redirect()->route('purchase.view')->with($notification);
    }
    public function pendinglist(){
        $allData = Purchase::orderBy('date','desc')->where('status','0')->get();
        return view('backend.purchase.view-pending-list', compact('allData'));
    }
    public function approve($id){
        $purchase =Purchase::find($id);
        $product =Product::where('id',$purchase->product_id)->first();
        $purchase_qty=((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->quantity =$purchase_qty;

        if($product->save()){
            DB::table('purchases')
                        ->where('id',$id)
                        ->update(['status'=> 1]);
        }
        $notification = array(
            'message' => 'Purchase Approved Successfully',
            'alert-type' => 'success'
        );
        return  redirect()->route('purchase.pending.list')->with($notification);
    }
    
}
