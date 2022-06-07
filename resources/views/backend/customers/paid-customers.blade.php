@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-primary">Paid  Customers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"> Paid Customers  Show</li>
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

                                    <a class="btn btn-primary float-right btn-sm" target="_blank"
                                        href="{{ route('customers.paid.pdf') }}"><i
                                            class="fa fa-download pr-3"></i>Download</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="color:#3A6408">
                                            <th>SL.</th>
                                            <th>Customer Name</th>
                                            <th>Invoice </th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $paid_total = '0';
                                        @endphp
                                        @foreach ($allData as $key => $payment)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $payment['customer']['name'] }}-
                                                    ({{ $payment['customer']['mobile'] }})
                                                    -(
                                                    {{ $payment['customer']['address'] }}
                                                    )
                                                </td>
                                                <td>{{ $payment['invoice']['invoice_no'] }}</td>
                                                <td>{{ date('d-m-Y', strtotime($payment['invoice']['date'])) }}</td>
                                                <td>{{ $payment->paid_amount }} Tk</td>
                                                <td>
                                                    {{-- <a href="{{ route('customers.edit.invoice', $payment->invoice_id) }}"
                                                        class="btn btn-sm btn-primary mr-5" title="Edit"><i
                                                            class="fa fa-edit"></i></a> --}}
                                                    <a href="{{ route('customers.invoice.details.pdf',$payment->invoice_id) }}"  target="_blank" class="btn btn-sm btn-info "><i
                                                            class="fa fa-eye"></i></a>
                                                </td>
                                                @php
                                                    $paid_total += $payment->paid_amount;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4" style="text-align:right"> <strong>Grand Total</strong> </td>
                                            <td>{{ $paid_total }} TK</td>
                                        </tr>

                                    </tbody>
                                </table>
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
@endsection
