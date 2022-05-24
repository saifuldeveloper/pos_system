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
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="text-primary">
                Invoice list
                <a class="btn btn-primary float-right btn-sm" href="{{ route('invoice.add') }}"><i class="fa fa-plus-circle pr-3"></i>Add Invoice</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table  table-bordered table-hover ">
                <thead>
                  <tr style="color:#3A6408">
                    <th>SL.</th>
                    <th>Customer Name</th>
                    <th>Invoice NO</th>
                    <th>Date</th>
                    <th>Describtion</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allData as $key=>$invoice)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>
                      {{$invoice['payment']['customer']['name']}}
                      ({{$invoice['payment']['customer']['mobile']}})-
                      ({{$invoice['payment']['customer']['address']}})
                    </td>
                    <td>Invoice no #{{$invoice->invoice_no}}</td>
                    <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                    <td>{{$invoice->description }}</td>
                    <td>{{$invoice['payment']['total_amount']}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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