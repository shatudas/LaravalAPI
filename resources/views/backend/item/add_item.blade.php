@extends('backend.layouts.master')
@section('content')


 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage Item</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Item</li>
       </ol>
      </div>
     </div>
    </div>
  </div>

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
   <div class="row justify-content-center">
    <div class="col-8">

     <div class="card">

       <div class="card-header">
        <h3> Add Item
         <a href="{{route('item.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Item List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('item.store')}}" id="myForm">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-12">
           <label for="name">Name</label>
           <input type="text" name="name" class="form-control">
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>

          <div class="form-group col-md-12">
           <label for="status">Status</label>
           <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="0">Active</option>
            <option value="1">Inactive</option>
           </select>
          </div>

          <div class="form-group col-md-12">
           <input type="submit" value="submit"  class="btn btn-primary">
          </div>

         </div>
        </form>
       </div>

     </div>
    </div>
   </div>
  </div>
 </section>


</div>


<script>
 $(function () {
  $('#myForm').validate({
    rules: {
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
     comfirmpass: {
     required: true,
     equalTo: '#password'
    },

    },
    messages: {
     name: {
        required: "Please Enter Name",
      },
      email: {
        required: "Please Enter a Email Address",
        email: "Please enter a <em>valid</em> email address",
      },
       password: {
        required: "Please Enter Password",
        minlength: "Password Will Be Minimam Six Digit",
      },
       comfirmpass: {
        required: "Please Enter Confirm Password",
        equalTo: "Confirm password Dose Not Match",
      },

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
  });
});
</script>

@endsection
