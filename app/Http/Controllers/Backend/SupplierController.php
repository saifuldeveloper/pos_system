<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
class SupplierController extends Controller
{
    public function view(){
        $allData=Supplier::all();
        // $data['allData']=Supplier::all();
        // return view('backend.supplier.view-supplier',$data);
        return view('backend.supplier.view-supplier',compact('allData'));

    }

    public function add(){
        return view('backend.supplier.add-supplier');

    }

    public function store(Request $request){
     $data =new Supplier();
     $data->created_by=Auth::user()->id;
     $data->name = $request->name;
     $data->mobile = $request->mobile;
     $data->email = $request->email;
     $data->address = $request->address;
     $data->save();
     $notification = array(
        'message' => 'supplier Inserted Successfully',
        'alert-type' => 'success'
     );
     return  redirect()->route('supplier.view')->with($notification);
    }
    public function edit($id){
        $editData=Supplier::find($id);
        return view('backend.supplier.edit-supplier',compact('editData'));
    }

    public function update(Request $request,$id){
        $data =Supplier::find($id);
        $data->updated_by=Auth::user()->id;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();
        $notification = array(
            'message' => 'supplier Data Update Successfully',
            'alert-type' => 'success'
         );
        return  redirect()->route('supplier.view')->with($notification);

    }
    public function delete($id){
        $supplier =supplier ::find($id);
        $supplier->delete();
        $notification = array(
            'message' => 'supplier Deleted Successfully',
            'alert-type' => 'error'
         );

        return  redirect()->route('supplier.view')->with($notification);

    }
}
