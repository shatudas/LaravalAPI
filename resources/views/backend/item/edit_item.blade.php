@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
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
        <h3> Edit Item
         <a href="{{route('item.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Item List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('item.update',$editdata->id)}}" id="myForm">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-12">
           <label for="name">Name</label>
           <input type="text" name="name" value="{{ $editdata->name }}" class="form-control">
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>


          <div class="form-group col-md-12">
           <label for="status">Status</label>
           <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="0" {{ $editdata->status=="0"?"selected":"" }}>Active</option>
            <option value="1" {{ $editdata->status=="1"?"selected":"" }}>Inactive</option>
           </select>
          </div>

        
          <div class="form-group col-md-6">
           <input type="submit" value="Update"  class="btn btn-primary">
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
     user_type: {
     required: true,
    },
    name: {
     required: true,
    },
     email: {
     required: true,
     email: true,
    },
    

    },
    messages: {
     user_type: {
        required: "Please Select Type",
      },
     name: {
        required: "Please Enter Name",
      },
      email: {
        required: "Please Enter a Email Address",
        email: "Please enter a <em>valid</em> email address",
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
