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
            <li class="breadcrumb-item active">Customers report</li>
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

                <a class="btn btn-primary float-right btn-sm" target="_blank" href="{{route('customers.creadit.pdf')}}"><i class="fa fa-download pr-3"></i>Download</a>
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
                  $total_due='0';
                  @endphp
                  @foreach ($allData as $key=> $payment)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $payment['customer']['name']}}-
                      ( {{$payment['customer']['mobile']}})-(
                      {{$payment['customer']['address']}}
                      )
                    </td>
                    <td>{{ $payment['invoice']['invoice_no']}}</td>
                    <td>{{ date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                    <td>{{ $payment->due_amount }} Tk</td>
                    <td>
                      <a href="" class="btn btn-sm btn-primary mr-5" title="Edit"><i class="fa fa-edit"></i></a>
                      <a href="" id="delete" class="btn btn-sm btn-danger " title="Delete"><i class="fa fa-eye"></i></a>
                    </td>
                    @php
                    $total_due+= $payment->due_amount;
                    @endphp
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="4" style="text-align:right"> <strong>Grand Total</strong> </td>
                    <td>{{$total_due}} TK</td>
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