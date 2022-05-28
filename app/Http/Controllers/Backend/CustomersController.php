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
}
