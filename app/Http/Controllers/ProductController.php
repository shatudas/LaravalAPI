<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\category;
use App\Models\Product;
use Auth;
use Image;

class ProductController extends Controller
{
   public function view(){
   $data['alldata'] = Product::all();
   return view('backend.product.view_product',$data);
  }

  public function add(){
  	$data['item'] =Item::where('status', 0)->get();
  	$data['category'] =category::where('status', 0)->get();
  	return view('backend.product.add_product',$data);
  }


   public function store(Request $request){

  	$this->validate($request,[
	  'item_id'      =>'required',
	  'category_id'  =>'required',
	  'name'         =>'required',
	  'quantity'     =>'required',
	  'price'        =>'required',
	  'status'       =>'required'
	  ]);

  	$data = new Product();
  	$data->item_id     = $request->item_id;
  	$data->category_id = $request->category_id;
  	$data->name        = $request->name;
  	$data->quantity    = $request->quantity;
  	$data->price       = $request->price;
  	$data->status      = $request->status;


  	if($request->file('image')){
    $file = $request->file('image');
    @unlink(public_path('upload/product_image/'.$data->image));
    $filename = 'IMG_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
    $file->move(public_path('upload/product_image/'),$filename);
    $data['image'] = $filename;
   }
   
   $data->save();
   return redirect()->route('product.view')->with('success','Data Saved Successfully');
  }


  public function edit($id){
   $data['item'] =Item::where('status', 0)->get();
  	$data['category'] =category::where('status', 0)->get();
   $data['editdata'] = Product::find($id);
   return view('backend.product.edit_product',$data);
  }


  public function update(Request $request,$id){

    $this->validate($request,[
	  'item_id'      =>'required',
	  'category_id'  =>'required',
	  'name'         =>'required',
	  'quantity'     =>'required',
	  'price'        =>'required',
	  'status'       =>'required'
	  ]);

      $data = Product::find($id);
      $data->category_id = $request->category_id;
      $data->name        = $request->name;
      $data->quantity    = $request->quantity;
      $data->price       = $request->price;
      $data->status      = $request->status;


	  	if($request->file('image')){
     $file = $request->file('image');
     @unlink(public_path('upload/product_image/'.$data->image));
     $filename = 'IMG_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
     $file->move(public_path('upload/product_image/'),$filename);
     $data['image'] = $filename;
    }

    $data->save();
    return redirect()->route('product.view')->with('success','Data Updated SuccessFully');
  }



   public function inactive($id)
   {
    Product::find($id)->where('id',$id)->update(['status'=>1]);
    return redirect()->back();
   }


  public function active($id)
   {
    Product::find($id)->where('id',$id)->update(['status'=>0]);
    return redirect()->back();
   }


  public function delete($id)
		 {
		  $data=Product::find($id);
		  if(file_exists('upload/product_image/'.$data->image) AND !empty($data->image)){
		  unlink('upload/product_image/'.$data->image);
		 }
			 $data->delete();
			 return redirect()->route('product.view')->with('error','Data Deleted Successfully');
		 }



}
