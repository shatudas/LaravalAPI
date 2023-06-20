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
   <div class="row">
    <div class="col-12">

     <div class="card">
      <div class="card-header">
       <h3>Product List
        <a href="{{route('product.add')}}" class=" btn btn-success btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add Product </a>
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr > 
          <th>SL</th>
          <th>Item Name</th>
          <th>Category Name</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Image</th>
          <th align="center">Status</th>
          <th>Action</th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $value)
          <tr > 
            <td>{{ $key+1 }}</td>
            <td>{{ $value['item']['name'] }}</td>
            <td>{{ $value['category']['name'] }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->quantity }}</td>
            <td>{{ $value->price }}</td>
            <td align="center">
             <img class="img-fluid" src="{{ url('upload/product_image/'.$value->image) }}" style="height:70px; width:70px;">
            </td>
            
            <td align="center">
             @if($value->status == '0')
              <a href="{{ route('product.inactive',$value->id) }}" class="btn btn-primary btn-sm" > Publish </a >
             @else
              <a href="{{ route('product.active',$value->id) }}" class="btn btn-danger btn-sm"  > Draft </a>
             @endif
            </td>

            <td>
             <a href="{{ route('product.edit',$value->id) }}" title="Edit" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
             <a href="{{ route('product.delete',$value->id) }}" title="Delete" id="delete"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>

          </tr>
         @endforeach
        </tbody>

       </table>
      </div>
     </div>  
    </div>
   </div>
  </div>
 </section>
</div>
  <!-- /.content-wrapper -->



@endsection
