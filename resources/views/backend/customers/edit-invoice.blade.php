@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-primary">Manage Customers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit invoice</li>
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
                                    <a class="btn btn-primary float-right btn-sm"
                                        href="{{ route('customers.creadit') }}"><i
                                            class="fa fa-plus-circle pr-3"></i>Creadit
                                        Customers</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table width="100%">
                                    <tbody>
                                        <!-- <h5>Customer Onfo</h5> -->
                                        <tr class="pb-1">
                                            <td width="15%"><strong>Name</strong> :{{ $payment['customer']['name'] }}</td>
                                            <td width="25%"><strong>Mobile
                                                    No</strong>:{{ $payment['customer']['mobile'] }}
                                            </td>
                                            <td width="30%"><strong>Addres</strong> :{{ $payment['customer']['address'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="{{ route('customers.update.invoice',$payment->invoice_id) }}" method="POST" id="myForm">
                                    @csrf
                                    <table border="2" width="100%" class="pb-4">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:5%">Sl</th>
                                                <th>Category</th>
                                                <th>Peoduct Name</th>
                                                <th>quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_sum = '0';
                                                $invoice_details = App\Models\InvoiceDetails::where('invoice_id', $payment->invoice_id)->get();
                                            @endphp
                                            @foreach ($invoice_details as $key => $details)
                                                <tr class="text-center">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $details['category']['name'] }}</td>
                                                    <td>{{ $details['product']['name'] }}</td>
                                                    <td>{{ $details->selling_qty }}</td>
                                                    <td>{{ $details->unit_price }}</td>
                                                    <td>{{ $details->selling_price }}</td>
                                                </tr>
                                                @php
                                                    $total_sum += $details->selling_price;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Sub total</strong></td>
                                                <td class="text-center"><strong>{{ $total_sum }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right">Discount</td>
                                                <td class="text-center">{{ $payment->discount_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right">Paid Amount</td>
                                                <td class="text-center">{{ $payment->paid_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right">Due Amount</td>
                                                <input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">
                                                <td class="text-center">{{ $payment->due_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Grand Total</strong></td>
                                                <td class="text-center"><strong>{{ $payment->total_amount }}</strong>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Paid Status</label>
                                            <select name="paid_status" id="paid_status"
                                                class="form-control form-control-sm">
                                                <option value="">Select Status</option>
                                                <option value="full_paid">Full Paid</option>
                                                <option value="partial_paid">Partial Paid</option>
                                            </select>
                                            <input type="number" name="paid_amount"
                                                class="form-control form-control-sm paid_amount"
                                                placeholder="Enter Paid Amount" style="display: none">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Date</label>
                                            <input type="text" name="date"
                                                value="{{ \Carbon\Carbon::parse($payment->date)->format('d M, Y') }}"
                                                id="date" class="form-control  form-control-sm">
                                        </div>
                                        <div class="form-group col-md-4 " style="padding-top:30px">
                                            <button type="submit" class="btn btn-primary btn-sm">Update Invoice </button>
                                        </div>
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
        // paid Status start
        $(document).on('change', '#paid_status', function() {
            var paid_status = $(this).val();
            if (paid_status == 'partial_paid') {
                $('.paid_amount').show();
            } else {
                $('.paid_amount').hide();
            }
        });
        // paid Status end
        // date picker start
        function datepicker() {
            $('#date').datepicker({
                format: 'dd M, yyyy',
                autoclose: true,
                todayHighlight: true,
            });
        }

        // form validation
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    paid_status: {
                        required: true,
                    },
                },
               
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
