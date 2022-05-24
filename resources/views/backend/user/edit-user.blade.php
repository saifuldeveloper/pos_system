@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">EditUser</h1>
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
                User Edit
                <a class="btn btn-info float-right btn-sm pl-3" href="{{ route('users.view') }}"><i class="fa fa-list pr-3"></i>User list</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('users.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="usertype">User Role</label>
                    <select name="usertype" id="usertype" class="form-control">
                      <option value="">Selected Role</option>
                      <option value="Admin" {{($editData->usertype=="Admin")?"selected":""}}>Admin</option>
                      <option value="User" {{($editData->usertype=="User")?"selected":""}}>User</option>
                    </select>
                    <font style="color: red">
                      {{ ($errors->has('usertype'))?($errors->first('usertype')):'' }}
                    </font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $editData->name }}" id="name" class="form-control">
                    <font style="color: red">
                      {{ ($errors->has('name'))?($errors->first('name')):'' }}
                    </font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $editData->email }}" id="email" class="form-control">
                    <font style="color: red">
                      {{ ($errors->has('email'))?($errors->first('email')):'' }}
                    </font>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="submit" value="Update" class="btn btn-primary col-md-12">
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
        usertype: {
          required: true,
        },
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6
        },
        password2: {
          required: true,
          equalTo: '#password'
        }
      },
      messages: {
        name: {
          required: "<font style='color:red'>Please Enter name</font>",
        },
        usertype: {
          required: "<font style='color:red'>Please select user role</font>",
        },
        email: {
          required: "<font style='color:red'>Please enter a email address</font>",
          email: "<font style='color:red'>Please enter a vaild email address</font>"
        },
        password: {
          required: "<font style='color:red'>Please provide a password</font>",
          minlength: "<font style='color:red'>Your password must be at least 6 characters long</font>"
        },
        password2: {
          required: "<font style='color:red'>Please enter confrim password</font>",
          equalTo: "<font style='color:red'>confirem passwrod does not match</font>"
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
      }
    });
  });
</script>

@endsection