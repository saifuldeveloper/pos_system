@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-primary">Manage Invoice</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="">
                                    Invoice
                                    NO:#{{ $invoice->invoice_no }}({{ \Carbon\Carbon::parse($invoice->date)->format('d M, Y') }})
                                    <a class="btn btn-primary float-right btn-sm"
                                        href="{{ route('invoice.pending.list') }}"><i
                                            class="fa fa-plus-circle pr-3"></i>Pending Invoice List</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <table width="100%">
                                    <tbody>
                                        @php
                                            $payment = App\Models\Payment::where('invoice_id', $invoice->id)->first();
                                        @endphp
                                        <!-- <h5>Customer Onfo</h5> -->
                                        <tr>
                                            <td width="15%">Customer Info</td>
                                            <td width="15%">Name :{{ $payment['customer']['name'] }}</td>
                                            <td width="25%">Mobile NO:{{ $payment['customer']['mobile'] }}</td>
                                            <td width="35%">Address :{{ $payment['customer']['address'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <form action="{{ route('approval.store', $invoice->id) }}" method="POST">
                                    @csrf
                                    <table border="1" width="100%" class="pb-4">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Sl</th>
                                                <th>Category</th>
                                                <th>Peoduct Name</th>
                                                <th style="background-color:#ddd;padding:2px;text-align:center">Current
                                                    Stock</th>
                                                <th>quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_sum = '0';
                                            @endphp
                                            @foreach ($invoice['invoice_details'] as $key => $details)
                                                <tr class="text-center">
                                                    <input type="hidden" name="category_id[]"
                                                        value="{{ $details->category_id }}">
                                                    <input type="hidden" name="product_id[]"
                                                        value="{{ $details->product_id }}">
                                                    <input type="hidden" name="selling_qty[{{ $details->id }}]"
                                                        value="{{ $details->selling_qty }}">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $details['category']['name'] }}</td>
                                                    <td>{{ $details['product']['name'] }}</td>
                                                    <td style="background-color:#ddd;padding:2px;text-align:center">
                                                        {{ $details['product']['quantity'] }}</td>
                                                    <td>{{ $details->selling_qty }}</td>
                                                    <td>{{ $details->unit_price }}</td>
                                                    <td>{{ $details->selling_price }}</td>
                                                </tr>
                                                @php
                                                    $total_sum += $details->selling_price;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="6" class="text-right"><strong>Sub total</strong></td>
                                                <td class="text-center"><strong>{{ $total_sum }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right">Discount</td>
                                                <td class="text-center">
                                                    <strong>{{ $payment->discount_amount }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right">Paid Amount</td>
                                                <td class="text-center"><strong>{{ $payment->paid_amount }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right">Due Amount</td>
                                                <td class="text-center"><strong>{{ $payment->due_amount }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right"><strong>Grand Total</strong></td>
                                                <td class="text-center"><strong>{{ $payment->total_amount }}</strong>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>
                                    <button style="float:right" type="submit" class="btn btn-success m-3">Invoice
                                        Approve</button>

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
@endsection
