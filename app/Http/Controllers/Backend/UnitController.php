<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function view(){
        $allData=Unit::all();
        return view('backend.unit.view-unit',compact('allData'));

    }

    public function add(){
        return view('backend.unit.add-unit');

    }

    public function store(Request $request){
     $data =new Unit();
     $data->created_by=Auth::user()->id;
     $data->name = $request->name;
     $data->save();
     $notification = array(
        'message' => 'Unit Inserted Successfully',
        'alert-type' => 'success'
     );
     return  redirect()->route('unit.view')->with($notification);
    }
    public function edit($id){
        $editData=Unit::find($id);
        return view('backend.unit.edit-unit',compact('editData'));
    }

    public function update(Request $request,$id){
        $data =Unit::find($id);
        $data->updated_by=Auth::user()->id;
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Unit Data Update Successfully',
            'alert-type' => 'success'
         );
        return  redirect()->route('unit.view')->with($notification);

    }
    public function delete($id){
        $Unit =Unit ::find($id);
        $Unit->delete();
        $notification = array(
            'message' => 'unit Deleted Successfully',
            'alert-type' => 'error'
         );

        return  redirect()->route('unit.view')->with($notification);

    }
}
