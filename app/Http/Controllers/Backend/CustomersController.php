<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomersController extends Controller
{
    public function view()
    {
        $allData = Customers::all();
        return view('backend.customers.view-customers', compact('allData'));
    }

    public function add()
    {
        return view('backend.customers.add-customers');
    }

    public function store(Request $request)
    {
        $data = new Customers();
        $data->created_by = Auth::user()->id;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();
        $notification = array(
            'message' => 'Customers Inserted Successfully',
            'alert-type' => 'success'
        );
        return  redirect()->route('customers.view')->with($notification);
    }
    public function edit($id)
    {
        $editData = Customers::find($id);
        return view('backend.customers.edit-customers', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $data = Customers::find($id);
        $data->updated_by = Auth::user()->id;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();
        $notification = array(
            'message' => 'customers Data Update Successfully',
            'alert-type' => 'success'
        );
        return  redirect()->route('customers.view')->with($notification);
    }
    public function delete($id)
    {
        $Customers = Customers::find($id);
        $Customers->delete();
        $notification = array(
            'message' => 'Customers Deleted Successfully',
            'alert-type' => 'error'
        );

        return  redirect()->route('customers.view')->with($notification);
    }
    public function customercreadit()
    {
        $allData = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        return view('backend.customers.creadit-customers', compact('allData'));
    }
    public function customercreaditpdf(){
        $data['allData'] = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        $pdf = PDF::loadView('backend.pdf.customers-report-pdf', $data);
        return $pdf->download('document.pdf');

    }
    public function editinvoice($invoice_id) {
        $payment = Payment::where('invoice_id',$invoice_id)->first();      
        return view('backend.customers.edit-invoice', compact('payment'));
    }
    public function updateinvoice(Request $request, $invoice_id){  
    if($request->new_paid_amount <$request->due_amount){
        $notification = array(
            'message' => 'Paid Amount is greater than Due Amount',
            'alert-type' => 'error'
        );
        return  redirect()->back()->with($notification);
    }else{
        $payment = Payment::where('invoice_id',$invoice_id)->first();
        $payment->paid_amount = $request->new_paid_amount;
        $payment->paid_status = $request->paid_status;
        if($request->paid_status == 'full_paid'){
            $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount'] + $request->new_paid_amount; 
            $payment->due_amount = '0';
            $payment_details->current_paid_amount = $request->new_paid_amount;  
        }elseif($request->paid_status == 'partial_paid'){
            $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount'] + $request->paid_amount;
            $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount'] - $request->paid_amount;
            $payment_details->current_paid_amount = $request->paid_amount;
        }
        $payment->save();
        $payment_details->invoice_id = $invoice_id;
        $payment_details->date =date('Y-m-d',strtotime($request->date));
        $payment_details->updated_by = Auth::user()->id;
        $payment_details->save();
        $notification = array(
            'message' => 'Invoice Updated Successfully',
            'alert-type' => 'success'
        );
        return  redirect()->route('customers.creadit')->with($notification);


    }
}




}
