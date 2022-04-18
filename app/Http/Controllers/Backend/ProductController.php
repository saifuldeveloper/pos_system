<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function view(){
        $allData=Product::all();
        // $data['allData']=Product::all();
        // return view('backend.Product.view-Product',$data);
        return view('backend.product.view-product',compact('allData'));

    }

    public function add(){
        $data['supplier']=Supplier::all();
        $data['category']=Category::all();
        $data['unit']=Unit::all();
        return view('backend.product.add-product',$data);

    }

    public function store(Request $request){
            $data =new Product();
            $data->created_by=Auth::user()->id;
            $data->name = $request->name;
            $data->supplier_id = $request->supplier_id;
            $data->category_id = $request->category_id;
            $data->unit_id = $request->unit_id;
            $data->quantity = '0';
            $data->save();
            $notification = array(
                'message' => 'Product Inserted Successfully',
                'alert-type' => 'success'
            );
            return  redirect()->route('product.view')->with($notification);
    }
    public function edit($id){
        $data['editData']=Product::find($id);
        $data['supplier']=Supplier::all();
        $data['category']=Category::all();
        $data['unit']=Unit::all();
        return view('backend.product.edit-product',$data);
    }

    public function update(Request $request,$id){
            $data =Product::find($id);
             $data->created_by=Auth::user()->id;
            $data->name = $request->name;
            $data->supplier_id = $request->supplier_id;
            $data->category_id = $request->category_id;
            $data->unit_id = $request->unit_id;
            $data->quantity = '0';
            $data->save();
        $notification = array(
            'message' => 'Product Data Update Successfully',
            'alert-type' => 'success'
         );
        return  redirect()->route('product.view')->with($notification);

    }
    public function delete($id){
        $Product =Product ::find($id);
        $Product->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'error'
         );

        return  redirect()->route('product.view')->with($notification);

    }
}
