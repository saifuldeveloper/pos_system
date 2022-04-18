
   @extends('backend.layouts.master')

   @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-primary">Manage Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                  product list
                  <a class="btn btn-primary float-right btn-sm" href="{{ route('purchase.add') }}"><i class="fa fa-plus-circle pr-3"></i>Add Purchase</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-responsive table-bordered table-hover ">
                    <thead>
                        <tr style="color:#3A6408">
                            <th>SL.</th>
                            <th>Purchase No</th>
                            <th>Date</th>
                            <th>Supplier Name</th>
                            <th>Category </th>
                            <th>Product Name </th>
                            <th>Describtion</th>
                            <th>Quantity</th>
                            <th>Unit  Price</th>
                            <th>Buying Price</th>
                            <th>Status</th>
                            <th style="width: 12%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as  $key=>$purchase)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $purchase->purchase_no }}</td>
                            <td>{{date('d-m-y',strtotime($purchase->date))}}</td>
                            <td>{{ $purchase['supplier']['name']}}</td>
                            <td>{{ $purchase['category']['name']}}</td>
                            <td>{{ $purchase['product']['name']}}</td>
                            <td>{{ $purchase->description}}</td>
                            <td>
                            {{ $purchase->buying_qty}}
                            {{ $purchase['product']['unit']['name']}}

                            </td>
                            <td>{{ $purchase->unit_price  }}</td>
                            <td>{{ $purchase->buying_price  }}</td>
                            <td>
                                @if($purchase->status =='0')
                                  <span style="background-color:#FFCA45;padding:5px;">Pending</span>
                                @elseif($purchase->status =='1')
                                  <span style="background-color: #23A9F2;padding:5px;">Approved</span>
                                @endif
                                
                            </td>
                            <td>
                                @if($purchase->status=="0")
                                <a href="{{ route('purchase.delete',$purchase->id) }}" id="delete" class="btn btn-sm btn-danger " title="Delete"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
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
