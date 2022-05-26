@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">Manage Supplier/Product wise Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <!-- <li class="breadcrumb-item active">Product</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-primary">
                              Select Criteria
                               <!--    <a class="btn btn-primary float-right btn-sm" target="_blank" href=""><i class="fa fa-download pr-3"></i>Download PDF</a> -->
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center ">
                                    <strong>Supplier Wise Report</strong>
                                    <input type="radio" name="supplier_wise" value="supplier_wise" class="search_value">
                                    &nbsp; &nbsp;
                                    <strong>Product Wise Report</strong>
                                    <input type="radio" name="supplier_wise" value="product_wise" class="search_value">   
                                </div>
                            </div>
                            <hr>

                            <div class="show_supplier" style="display: none;">
                                <form method="GET" action="{{route('stock.report.supplier.wise.pdf')}}" target="_blank" id="supplierWiseForm">
                                    <div class="form-row">
                                        <div class="col-sm-8">
                                            <label for="">Supplier Name</label>
                                           
                                            <select name="supplier_id" id="" class="form-control select2">
                                            <option value="">select supplier</option>
                                              @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                              @endforeach

                                              
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-top:30px;"> 
                                            <button type="submit" class="btn btn-primary" style="height: 30px;">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                           
                        </div><!-- /.card-body -->
                    </div>
                </section>
                <!-- /.Left col -->

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<script type="text/javascript">
    $(document).on('change','.search_value',function(){
        var search_value =$(this).val();
        if(search_value =='supplier_wise'){
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
    });
</script>

<script>
  $(document).ready(function() {
    $('#supplierWiseForm').validate({
        ignore:[],
        errorplacement:function(error,element){
            if(element.attr("name") =="supplier_id"){ 
                error.insertAfter(element.next());
            }else{
                error.insertAfter(element);

            }
        },
        errorClass:'text-danger',
        validClass:'text-success',
      rules: {
        supplier_id: {
          required: true,   
        }
      },
      
    });
  });
</script>

@endsection