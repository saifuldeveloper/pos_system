@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
              <h3>
                Supplier Edit
                <a class="btn btn-info float-right btn-sm pl-3" href="{{ route('supplier.view') }}"><i class="fa fa-list pr-3"></i>Supplier list</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('supplier.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-8  m-auto ">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $editData->name }}" class="form-control">
                  </div>
                  <div class="form-group col-md-8  m-auto">
                    <label for="mobile">mobile</label>
                    <input type="text" name="mobile" id="mobile" value="{{ $editData->mobile }}" class="form-control">
                  </div>
                  <div class="form-group col-md-8  m-auto">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $editData->email }}" class="form-control">
                  </div>
                  <div class="form-group col-md-8  m-auto">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" id="address">{{ $editData->address }}</textarea>
                  </div>
                  <div class="form-group col-md-8 m-auto pt-4">
                    <input type="submit" value="submit" class="btn btn-primary col-md-12">
                  </div>
                </div>
              </form>
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
<script>
  $(document).ready(function() {
    $('#myForm').validate({
      rules: {
        name: {
          required: true,
          name: true,
        },
        mobile: {
          required: true,
          mobile: true,
        },
        email: {
          required: true,
          email: true,
        },
        address: {
          required: true,
          address: true,
        }
      },
      //  messages: {
      //      name: {
      //      required: 'Please Enter name',
      //    },
      //      usertype: {
      //      required: "Please select user role",
      //    },
      //    email: {
      //      required: "Please enter a email address",
      //      email: "Please enter a vaild email address"
      //    },
      //    password: {
      //      required: "Please provide a password",
      //      minlength: "Your password must be at least 6 characters long"
      //    },
      //    password2: {
      //      required: "Please enter confrim password",
      //      equalTo: "confirem passwrod does not match"
      //    }
      //  },
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