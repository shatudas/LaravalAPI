@extends('backend.layouts.master')
@section('content')


 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage Category</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
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
        <h3> Add Category
         <a href="{{route('category.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Category List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('category.update',$editdata->id)}}" id="myForm">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-12">
           <label for="item_id">Item Name</label>
           <select name="item_id" class="form-control">
             <option value="">Select Item</option>
             @foreach($item as $value)
             <option value="{{ $value->id }}" {{ ($editdata->item_id == $value->id)?'selected':'' }}> {{ $value->name }} </option>
             @endforeach
           </select>
           <font style="color:red">{{($errors->has('item_id'))?($errors->first('item_id')):'' }}</font>
          </div>


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
    item_id: {
     required: true,
    },
     name: {
     required: true,
    },
  
    },
    messages: {
     item_id: {
        required: "Please Enter Item Name",
      },
      name: {
        required: "Please Enter Name",
      },
       status: {
        required: "Please Select Status",
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
