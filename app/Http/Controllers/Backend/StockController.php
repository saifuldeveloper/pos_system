<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

use PDF;

class StockController extends Controller
{
    public function stockreport()
    {
         $allData=Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.stock.stock-report',compact('allData'));
    }
    public function stockreportPdf(){
        $data['allData']=Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        $pdf = PDF::loadView('backend.pdf.stock-report-pdf', $data);
        return $pdf->download('document.pdf');
    }
    public function stockreportSupplierwise(){
        $data['suppliers']=Supplier::all();
        return view('backend.stock.supplier-wise-report',$data);
    }
    public function  stockreportSupplierwisepdf(Request $request){
        $data['allData']=Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('backend.pdf.supplier-wise-stock-report-pdf', $data);
        return $pdf->download('document.pdf');
        
    }
}
