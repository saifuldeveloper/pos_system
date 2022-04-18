
   @extends('backend.layouts.master')

   @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
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
                  Edit Profile
                  <a class="btn btn-success float-right btn-sm pl-3" href="{{ route('profiles.view') }}"><i class="fa fa-user"></i>Your Profile</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                 <form method="post"  action="{{ route('profiles.update') }}" id="myForm" enctype="multipart/form-data">
                     @csrf

                     <div class="form-row">

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
                        <div class="form-group col-md-4">
                            <label for="mobile">Mobile</label>
                            <input type="mobile" name="mobile" value="{{ $editData->mobile }}" id="mobile" class="form-control">
                            <font style="color: red">
                                {{ ($errors->has('mobile'))?($errors->first('mobile')):'' }}
                          </font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">address</label>
                            <input type="address" name="address" value="{{ $editData->address }}" id="address" class="form-control">
                            <font style="color: red">
                                {{ ($errors->has('address'))?($errors->first('address')):'' }}
                          </font>
                        </div>
                         <div class="form-group col-md-4">
                             <label for="gender">Gender</label>
                             <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male"{{($editData->gender=="Male")?"selected":""}}>Male</option>
                                <option value="Female" {{($editData->gender=="User")?"Female":""}}>Female</option>
                            </select>
                            <font style="color: red">
                                {{ ($errors->has('gender'))?($errors->first('gender')):'' }}
                          </font>
                         </div>
                         <div class="form-group col-md-4">
                            <label for="image">Image</label>
                              <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <img  id="showImage" src="{{ (!empty($editData->image))? asset('upload/user_images/'.$editData->image):asset('upload/no.png')}}" alt="" style="width:150px;height:160px; border:1px solid #000;">
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
    $(document).ready(function(){
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
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
         }
         }
      });
    });
    </script>

      <!---show image script---->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader =new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

  @endsection
