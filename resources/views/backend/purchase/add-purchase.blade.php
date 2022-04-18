@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Purchase</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">list</li>
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
              <h3>
                <a class="btn btn-primary float-right btn-sm pl-3" href="{{ route('purchase.view') }}"><i class="fa fa-list pr-3"></i>Purchase list</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Date</label>
                  <input type="date" name="date" id="date" class="form-control datepicker form-control-sm">
                </div>
                <div class="form-group col-md-4  ">
                  <label>Purchase No</label>
                  <input type="text" name="purchase_no" id="purchase_no" class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-4 ">
                  <label>Supplier Name</label>
                  <select name="supplier_id" id="supplier_id" class="form-control select2" >
                    <option value="" style="padding:10px;"> Select Supplier </option>
                    @foreach ($supplier as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4 ">
                  <label>Category Name</label>
                  <select name="category_id" id="category_id" class="form-control select2">
                    <option value=""> Select Category </option>
                  </select>
                </div>
                <div class="form-group col-md-6 ">
                  <label>Product Name</label>
                  <select name="product_id" id="product_id" class="form-control select2">
                    <option value=""> Select Product </option>
                  </select>
                </div>
                <div class="form-group col-md-2" style="padding-top: 30px;">
                  <div class="btn btn-primary  btn-sm addeventmore" id="addeventmore">
                    <i class="fa fa-plus-circle pr-3"></i>Add Item
                  </div>

                </div>
              </div>
            </div><!-- /.card-body -->

            <div class="card-body">
              <form action="{{route('purchase.store')}}" method="POST" id="myForm">
                @csrf
                <table class="table table-bordered" width="100%">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th width="7%">Pc/KG</th>
                      <th width="10%">Unit Price</th>
                      <th>Describtion</th>
                      <th width="15%">Totoal price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="Addrow" id="Addrow">

                  </tbody>
                  <tbody>
                    <tr>
                      <td colspan="5" class="text-right text-bold">Total Amount</td>
                      <td>
                        <input type="text" name="estimated_amount" id="estimated_amount" value="0" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA;">
                      </td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="storeBtn">Purchase Store</button>
                </div>

              </form>
            </div>
          </div>


        </section>
        <!-- /.Left col -->

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script>
  $(document).ready(function() {
    $('#myForm').validate({
      rules: {
        name: {
          required: true,
          name: true,
        },
        supplier_id: {
          required: true,
          supplier_id: true,
        },
        category_id: {
          required: true,
          category_id: true,
        },
        unit_id: {
          required: true,
          unit_id: true,
        }

      },
      //  messages: {
      //      name: {
      //      required: 'Please Enter name',
      //    },
      //      usertype: {
      //      required: "Please select user role",
      //    },
      //    category_id: {
      //      required: "Please enter a email address",
      //      email: "Please enter a vaild email address"
      //    },
      //    password: {
      //      required: "Please provide a password",
      //      minlength: "Your password must be at least 6 characters long"
      //    },
      //    password2: {
      //      required: "Please enter confrim password",
      //      equalTo: "confirem passwrod does not match"
      //    }
      //  },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
{{-- <script>
     $('.datepicker').datepicker({
         uiLibrary:'bootstrap4',
         format:'yyyy-mm-dd'
     });
 </script> --}}
<script type="text/javascript">
  $(function() {
    $(document).on('change', '#supplier_id', function() {
      var supplier_id = $(this).val();
      $.ajax({
        url: "{{route('get-category') }}",
        type: "GET",
        data: {
          supplier_id: supplier_id
        },
        success: function(data) {
          var html = '<option value=""> Select Category </option>';
          $.each(data, function(key, v) {
            html += '<option value="' + v.category_id + '">' + v.category.name + '</option>';

          });
          $('#category_id').html(html);
        }

      });
    });
  });
</script>

<script type="text/javascript">
  $(function() {
    $(document).on('change', '#category_id', function() {
      var category_id = $(this).val();
      $.ajax({
        url: "{{route('get-product') }}",
        type: "GET",
        data: {
          category_id: category_id
        },
        success: function(data) {
          var html = '<option value=""> Select Product</option>';
          $.each(data, function(key, v) {
            html += '<option value="' + v.id + '">' + v.name + '</option>';

          });
          $('#product_id').html(html);
        }

      });
    });
  });
</script>


<script id="document-templete" type="text/x-handlebars-templete">
  <tr class="delete_add_more_item" id="delete_add_more_item">
     <input type="hidden" name="date[]" value="@{{date}}">
     <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
     <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">

     <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{category_name}}
     </td>
     <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{product_name}}
     </td>
     <td>
        <input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
     </td>
     <td>
        <input type="number"  class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
     </td>
     <td>
        <input type="text"  class="form-control  text-right" name="description[]">
     </td>
     <td>
        <input  class="form-control  text-right buying_price" name="buying_price[]"  value="0"readonly>
     </td>
     
     <td>
       <i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i>
     </td>

  </tr>

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '#addeventmore', function() {
       var date        =$('#date').val();
       var purchase_no =$('#purchase_no').val();
       var supplier_id =$('#supplier_id').val();
       var category_id =$('#category_id').val();
       var category_name =$('#category_id').find('option:selected').text();
       var product_id =$('#product_id').val();
       var product_name =$('#product_id').find('option:selected').text();

        if(date ==''){
          alert('date is null');
          return false;
        };
        if(purchase_no ==''){
          alert('Purchase  Fields null');
          return false;
        };
        if(supplier_id ==''){
          alert('Supplier  null');
          return false;
        };
        if(category_id ==''){
          alert('Category   null');
          return false;
        };
        if(product_id ==''){
          alert('Product   null');
          return false;
        };

        var source =$('#document-templete').html();
        var template= Handlebars.compile(source);
         var data ={
                  date:date,
                  purchase_no:purchase_no,
                  supplier_id:supplier_id,
                  category_id:category_id,
                  category_name:category_name,
                  product_id:product_id,
                  product_name:product_name,

         };
         var html =template(data);
         $('#Addrow').append(html);
    });
    $(document).on('click','.removeeventmore',function(event){
       $(this).closest(".delete_add_more_item").remove();
       totalAmountPrice();

    });

    $(document).on('keyup click','.unit_price,.buying_qty',function(){
       var unit_price   =$(this).closest("tr").find("input.unit_price").val();
       var qty          =$(this).closest("tr").find("input.buying_qty").val();
       var total        =unit_price * qty;
       $(this).closest("tr").find("input.buying_price").val(total);
       totalAmountPrice();
    });

    function totalAmountPrice(){
      var sum=0;
      $('.buying_price').each(function(){
         var value =$(this).val();
         if(!isNaN(value) && value.lenght !=0){
            sum += parseFloat(value);
         }
      });
      $('#estimated_amount').val(sum);
    }
     
    });
 

</script>





@endsection