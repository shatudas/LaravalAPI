@extends('backend.layouts.master')
@section('content')


 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage Product</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
       </ol>
      </div>
     </div>
    </div>
  </div>

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
   <div class="row justify-content-center">
    <div class="col-10">

     <div class="card">

       <div class="card-header">
        <h3> Add Product
         <a href="{{route('product.view')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-list"></i> Product List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('product.store')}}" id="myForm"  enctype="multipart/form-data">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-6">
           <label for="item_id">Item Name</label>
           <select name="item_id" class="form-control">
             <option value="">Select Item</option>
             @foreach($item as $value)
             <option value="{{ $value->id }}">{{ $value->name }}</option>
             @endforeach
           </select>
           <font style="color:red">{{($errors->has('item_id'))?($errors->first('item_id')):'' }}</font>
          </div>


          <div class="form-group col-md-6">
           <label for="category_id">Category  Name</label>
           <select name="category_id" class="form-control">
             <option value="">Select Category</option>
             @foreach($category as $value)
             <option value="{{ $value->id }}">{{ $value->name }}</option>
             @endforeach
           </select>
           <font style="color:red">{{($errors->has('category_id'))?($errors->first('category_id')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <label for="name">Name</label>
           <input type="text" name="name" class="form-control">
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <label for="quantity">Quantity</label>
           <input type="text" name="quantity" class="form-control">
           <font style="color:red">{{($errors->has('quantity'))?($errors->first('quantity')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <label for="price">Price</label>
           <input type="text" name="price" class="form-control">
           <font style="color:red">{{($errors->has('price'))?($errors->first('price')):'' }}</font>
          </div>


          <div class="form-group col-md-3">
            <label for="image"> Image </label>
            <input type="file" name="image" class="form-control" id="image">
            <font style="color:red">{{ ($errors->has('image'))?($errors->first('image')):'' }}</font>
           </div>

           <div class="form-group col-md-3">
            <img id="showImage" src="" style=" height:60px; width:60px; margin-top:15px; border:1px solid #ccc; float:right;">
           </div>

          <div class="form-group col-md-6">
           <label for="status">Status</label>
           <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="0">Active</option>
            <option value="1">Inactive</option>
           </select>
           <font style="color:red">{{ ($errors->has('status'))?($errors->first('status')):'' }}</font>
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


@endsection
