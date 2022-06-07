@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-primary">Manage Customers wise Report</h1>
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
                                        <strong>Customers Credit wise Report</strong>
                                        <input type="radio" name="customers_wise_report" value="customers_wise_credit"
                                            class="search_value">
                                        &nbsp; &nbsp;
                                        <strong>Customers paid wise Report</strong>
                                        <input type="radio" name="customers_wise_report" value="customers_wise_paid"
                                            class="search_value">
                                    </div>
                                </div>
                                <hr>

                                <div class="show_credit" style="display: none;">
                                    <form method="GET" action="{{ route('customers.wise.credit.report') }}"
                                        target="_blank" id="creditWiseForm">
                                        <div class="form-row">
                                            <div class="col-sm-8">
                                                <label for="">Customer Name</label>
                                                <select name="customer_id" id="customer_id" class="form-control">
                                                    <option value="">Select Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}
                                                         ({{ $customer->mobile }})
                                                         ({{ $customer->address }})
                                                        </option>
                                                    @endforeach
                                                </select>

                                               
                                            </div>
                                            <div class="col-sm-4" style="padding-top:30px;">
                                                <button type="submit" class="btn btn-primary"
                                                    style="height: 40px;">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="show_paid" style="display:none;">
                                    <form method="GET" action="{{ route('customers.wise.paid.report') }}" target="_blank"
                                        id="customerpaidWiseForm">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Customers Name</label>
                                                <select name="customer_id" id="customer_id" class="form-control">
                                                    <option value="">Select Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}
                                                         ({{ $customer->mobile }})
                                                         ({{ $customer->address }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            <div class="col-sm-2" style="padding-top:30px;">
                                                <button type="submit" class="btn btn-primary"
                                                    style="height: 40px;">Search</button>
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
        $(document).on('change', '.search_value', function() {
            var search_value = $(this).val();
            if (search_value == 'customers_wise_credit') {
                $('.show_credit').show();
            } else {
                $('.show_credit').hide();
            }
            if (search_value == 'customers_wise_paid') {
                $('.show_paid').show();
            } else {
                $('.show_paid').hide();
            }
        });
    </script>
    
    <!-- supplier wise validatin sart -->
    <script>
        $(document).ready(function() {
            $('#creditWiseForm').validate({
                ignore: [],
                errorplacement: function(error, element) {
                    if (element.attr("name") == "customer_id") {
                        error.insertAfter(element.next());
                    } else {
                        error.insertAfter(element);

                    }
                },
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    customer_id: {
                        required: true,
                    }
                },

            });
        });
    </script>
    <!-- supplier wise validatin end -->
    <!-- product wise validation start -->
    <script>
        $(document).ready(function() {
            $('#customerpaidWiseForm').validate({
                ignore: [],
                errorplacement: function(error, element) {
                    if (element.attr("name") == "customer_id") {
                        error.insertAfter(element.next());
                    } else {
                        error.insertAfter(element);

                    }
                },
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    customer_id: {
                        required: true,
                    }
                },

            });
        });
    </script>
    <!-- product wise validation end -->
@endsection
