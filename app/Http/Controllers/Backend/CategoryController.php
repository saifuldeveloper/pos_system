<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function view(){
        $allData=Category::all();
        return view('backend.category.view-category',compact('allData'));

    }

    public function add(){
        return view('backend.category.add-category');

    }

    public function store(Request $request){
     $data =new Category();
     $data->created_by=Auth::user()->id;
     $data->name = $request->name;
     $data->save();
     $notification = array(
        'message' => 'Category Inserted Successfully',
        'alert-type' => 'success'
     );
     return  redirect()->route('category.view')->with($notification);
    }
    public function edit($id){
        $editData=Category::find($id);
        return view('backend.category.edit-category',compact('editData'));
    }

    public function update(Request $request,$id){
        $data =Category::find($id);
        $data->updated_by=Auth::user()->id;
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Category Data Update Successfully',
            'alert-type' => 'success'
         );
        return  redirect()->route('category.view')->with($notification);

    }
    public function delete($id){
        $Category =Category ::find($id);
        $Category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'error'
         );

        return  redirect()->route('category.view')->with($notification);

    }
}
