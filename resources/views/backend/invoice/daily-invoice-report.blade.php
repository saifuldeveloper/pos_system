@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daily Invoice Report</h1>
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
                                <!-- <h3>
                                    <a class="btn btn-primary float-right btn-sm pl-3" href=""><i class="fa fa-list pr-3"></i>Invoice list</a>
                                </h3> -->
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('invoice.daily.invoice.pdf') }}" method="GET" target="_blank"
                                    id="myForm">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Start Date</label>
                                            <input type="text" name="start_date" value="" id="start_date"
                                                class="form-control  datepicker form-control-sm" placeholder="YYYY-MM-DD"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>End Date</label>
                                            <input type="text" name="end_date" value="" id="end_date"
                                                class="form-control  datepic form-control-sm" placeholder="YYYY-MM-DD"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-4 " style="padding-top: 30px;">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>

                                        </div>
                                    </div>

                                </form>

                            </div><!-- /.card-body -->
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
        //   $( function() {
        //     $( ".datepicker" ).datepicker();
        //   } );
        $('.datepicker').datepicker({
            uiLibary: 'bootstrap4',
            dateFormat: 'yy-mm-dd',
        });
        $('.datepic').datepicker({
            uiLibary: 'bootstrap4',
            dateFormat: 'yy-mm-dd',
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    start_date: {
                        required: true,

                    },
                    end_date: {
                        required: true,

                    }
                },
                //    messages: {
                //     start_date: {
                //        required: 'Please  select first date',
                //      },
                //     end_date: {
                //         end_date: {
                //        required: "Please select emd date",
                //      },

                //    },
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
@endsection
