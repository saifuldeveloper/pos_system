@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-primary">Manage Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
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
                Category list
                <a class="btn btn-primary float-right btn-sm" href="{{ route('category.add') }}"><i class="fa fa-plus-circle pr-3"></i>Add Category</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr style="color:#3A6408">
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allData as $key=>$category)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $category->name }}</td>
                    @php
                    $count_category= App\Models\Product::where('category_id',$category->id)->count();
                    @endphp
                    <td>
                      <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-primary mr-5" title="Edit"><i class="fa fa-edit"></i></a>
                      @if($count_category<1) <a href="{{ route('category.delete',$category->id) }}" id="delete" class="btn btn-sm btn-danger " title="Delete"><i class="fa fa-trash"></i></a>
                        @endif
                    </td>
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