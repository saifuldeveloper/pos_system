@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-primary">Manage Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Password</li>
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
                Edit Password

              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('profiles.password.update') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-row" style="color:#3A6408">
                  <div class="form-group col-md-4">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="again_new_password">Again New Password</label>
                    <input type="password" name="again_new_password" class="form-control">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="submit" value="update" class="btn btn-primary col-md-12">
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
        current_password: {
          required: true,
        },
        new_password: {
          required: true,
          minlength: 6
        },
        again_new_password: {
          required: true,
          equalTo: '#new_password'
        }
      },
      messages: {
        current_password: {
          required: "Please Current password",
        },
        new_password: {
          required: "Please Enter new  password",
          minlength: "Your password must be at least 6 characters long"
        },
        again_new_password: {
          required: "Please enter new confrim password",
          equalTo: "confirem passwrod does not match"
        }
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