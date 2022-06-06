@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-primary">Manage Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                                    <a class="btn btn-primary float-right btn-sm" href="{{ route('product.add') }}"><i
                                            class="fa fa-plus-circle pr-3"></i>Add product</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="color:#3A6408">
                                            <th>SL.</th>
                                            <th>Supplier Name</th>
                                            <th>Category Name </th>
                                            <th>Unit</th>
                                            <th>Product Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ @$product['supplier']['name'] }}</td>
                                                <td>{{ $product['category']['name'] }}</td>
                                                <td>{{ @$product['unit']['name'] }}</td>
                                                <td>{{ $product->name }}</td>
                                                @php
                                                    $count_product = App\Models\Purchase::where('product_id', $product->id)->count();
                                                @endphp
                                                <td>
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-sm btn-primary mr-5" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                    @if ($count_product < 1)
                                                        <a href="{{ route('product.delete', $product->id) }}" id="delete"
                                                            class="btn btn-sm btn-danger " title="Delete"><i
                                                                class="fa fa-trash"></i></a>
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
