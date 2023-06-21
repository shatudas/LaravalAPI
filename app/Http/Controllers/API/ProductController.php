<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\category;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{

  public function view(){
   $data['alldata'] = Product::all();
   return response()->json($data);
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
           
    $data->save();
    return response()->json($data);
    }

	  public function edit($id){
	   $data['item'] =Item::where('status', 0)->get();
	  	$data['category'] =category::where('status', 0)->get();
	   $data['editdata'] = Product::find($id);
	   return response()->json($data);
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
    $data->save();
    return response()->json($data);
   
  }

   public function inactive($id)
   {
    Product::find($id)->where('id',$id)->update(['status'=>1]);
    return response()->json($data);
   }


  public function active($id)
   {
    Product::find($id)->where('id',$id)->update(['status'=>0]);
    return response()->json($data);
   }


  public function delete($id)
		 {
		  $data=Product::find($id);
			 $data->delete();
			 return response()->json($data);
		 }


}
