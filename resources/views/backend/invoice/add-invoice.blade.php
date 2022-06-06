@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Invoice</h1>
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
                                    <a class="btn btn-primary float-right btn-sm pl-3"
                                        href="{{ route('invoice.view') }}"><i class="fa fa-list pr-3"></i>Invoice list</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Purchase No</label>
                                        <input type="text" name="invoice_no" value="{{ $invoice_no }}" id="invoice_no"
                                            class="form-control form-control-sm" readonly
                                            style="background-color: #D8FDBA;">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Date</label>
                                        <input type="text" name="date"
                                            value="{{ \Carbon\Carbon::parse($date)->format('d M, Y') }}" id="date"
                                            class="form-control  form-control-sm">
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <label>Category Name</label>
                                        <select name="category_id" id="category_id" class="form-control select2">
                                            <option value="" style="padding:10px;"> Select Category </option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <label>Product Name</label>
                                        <select name="product_id" id="product_id" class="form-control select2">
                                            <option value=""> Select Product </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 ">
                                        <label>Stock (pcs/Kg)</label>
                                        <input type="text" name="cuttent_stoct_qty" id="cuttent_stoct_qty"
                                            class="form-control form-control-sm" readonly style="background-color: #D8FDBA">
                                    </div>
                                    <div class="form-group col-md-4 " style="padding-top: 30px;">
                                        <div class="btn btn-primary  btn-sm addeventmore" id="addeventmore">
                                            <i class="fa fa-plus-circle pr-3"></i>Add
                                        </div>

                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                            <!-- Amin  -->
                            <div class="card-body">
                                <form action="{{ route('invoice.store') }}" method="POST" id="myForm">
                                    @csrf
                                    <table class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Category </th>
                                                <th>Product Name</th>
                                                <th width="7%">Pc/KG</th>
                                                <th width="10%">Unit Price</th>
                                                <th width="17%">Totoal price</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="Addrow" id="Addrow">

                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-right">Discount</td>
                                                <td>
                                                    <input type="text" name="discount_amount" id="discount_amount"
                                                        class="form-control form-control-sm discount_amount"
                                                        placeholder="Enter Discount Amount">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right text-bold">Total Amount</td>
                                                <td>
                                                    <input type="text" name="estimated_amount" id="estimated_amount"
                                                        value="0"
                                                        class="form-control form-control-sm text-right estimated_amount"
                                                        readonly style="background-color: #D8FDBA;">
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea name="description" id="description" class="form-control" placeholder="Write Description Here"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">Paid Status</label>
                                            <select name="paid_status" id="paid_status"
                                                class="form-control form-control-sm">
                                                <option value="">Select Status</option>
                                                <option value="full_paid">Full Paid</option>
                                                <option value="full_due">Full Due</option>
                                                <option value="partial_paid">Partial Paid</option>
                                            </select>
                                            <input type="number" name="paid_amount"
                                                class="form-control form-control-sm paid_amount"
                                                placeholder="Enter Paid Amount" style="display: none">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="">Customer Name</label>
                                            <select name="customer_id" id="customer_id"
                                                class="form-control form-control-sm">
                                                <option value=""> Select Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}
                                                        ({{ $customer->mobile }}) ({{ $customer->address }})</option>
                                                @endforeach
                                                <option value="0">New Customers</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row new_customer" style="display: none">
                                        <div class="form-group col-md-4">
                                            <input type="text" name="name" id="name" class="form-control form-control-sm"
                                                placeholder="Write Customer Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="number" name="mobile" id="mobile"
                                                class="form-control form-control-sm" placeholder="Write Customer Mobile">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="address" id="address"
                                                class="form-control form-control-sm" placeholder="Write Customer Address">
                                        </div>
                                    </div>
                            </div>
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

    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        var html = '<option value=""> Select Product</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id + '">' + v.name +
                                '</option>';

                        });
                        $('#product_id').html(html);
                    }

                });
            });
        });
    </script>

    {{-- stock --}}
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#product_id', function() {
                var product_id = $(this).val();
                $.ajax({
                    url: "{{ route('check-product-stock') }}",
                    type: "GET",
                    data: {
                        product_id: product_id,
                    },
                    success: function(data) {
                        $('#cuttent_stoct_qty').val(data);

                    }
                });

            });
        });
    </script>


    <script id="document-templete" type="text/x-handlebars-templete"><tr class="delete_add_more_item" id="delete_add_more_item">
         <input type="hidden" name="date" value="@{{ date }}">
         <input type="hidden" name="invoice_no" value="@{{ invoice_no }}">
         <td>
            <input type="hidden" name="category_id[]" value="@{{ category_id }}">
            @{{ category_name }}
         </td>
         <td>
            <input type="hidden" name="product_id[]" value="@{{ product_id }}">
            @{{ product_name }}
         </td>
         <td>
            <input type="number" min="1" class="form-control form-control-sm text-right selling_qty" name="selling_qty[]" value="1">
         </td>
         <td>
            <input type="number"  class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
         </td>
         <td>
            <input  class="form-control  text-right selling_price" name="selling_price[]"  value="0"readonly>
         </td>
         
         <td>
           <i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i>
         </td>

      </tr></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#addeventmore', function() {
                var date = $('#date').val();
                var invoice_no = $('#invoice_no').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();

                if (date == '') {
                    toastr.error("Date filed is Null");
                    return false;
                };
                if (category_id == '') {
                    toastr.error("Category filed is Null");
                    return false;
                };
                if (product_id == '') {
                    toastr.error("Product filed is Null");
                    return false;
                };
                var source = $('#document-templete').html();
                var template = Handlebars.compile(source);
                var data = {
                    date: date,
                    invoice_no: invoice_no,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name,

                };
                var html = template(data);
                $('#Addrow').append(html);
            });
            $(document).on('click', '.removeeventmore', function(event) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();

            });

            $(document).on('keyup click', '.unit_price,.selling_qty', function() {
                var unit_price = $(this).closest("tr").find("input.unit_price").val();
                var qty = $(this).closest("tr").find("input.selling_qty").val();
                var total = unit_price * qty;
                $(this).closest("tr").find("input.selling_price").val(total);
                $('#discount_amount').trigger('keyip');
            });

            $(document).on('keyup', '#discount_amount', function() {
                totalAmountPrice();
            })

            function totalAmountPrice() {
                var sum = 0;
                $('.selling_price').each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.lenght != 0) {
                        sum += parseFloat(value);
                    }
                });
                var discount_amount = parseFloat($('#discount_amount').val());
                if (!isNaN(discount_amount) && discount_amount.lenght != 0) {
                    sum -= parseFloat(discount_amount);
                }

                $('#estimated_amount').val(sum);

            }

        });
    </script>

    <script type="text/javascript">
        // paid Status start
        $(function() {
            $(document).on('change', '#paid_status', function() {

                var paid_status = $(this).val();
                if (paid_status == 'partial_paid') {
                    $('.paid_amount').show();
                } else {
                    $('.paid_amount').hide();
                }

            });
        });
        // paid Status end
        //  Customer status
        $(function() {
            $(document).on('change', '#customer_id', function() {

                var customer_id = $(this).val();
                if (customer_id == '0') {
                    $('.new_customer').show();
                } else {
                    $('.new_customer').hide();
                }

            });
        });
    </script>
@endsection
