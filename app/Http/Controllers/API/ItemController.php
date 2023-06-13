<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Auth;


class ItemController extends Controller
{

  public function view(){
   $data['alldata'] = Item::all();
   return response()->json($data);
  }

  public function store(Request $request){
  	$this->validate($request,[
	  'name'       =>'required',
	  'status'     =>'required'
	  ]);

  	$data = new Item();
  	$data->name = $request->name;
  	$data->status = $request->status;
   $data->save();
   return response()->json($data);
  }


   public function edit($id){
  	$editdata=Item::find($id);
  	return response()->json($editdata);
  }


   public function update(Request $request,$id){

  	$this->validate($request,[
	  'name'       =>'required',
	  'status'     =>'required'
	  ]);

	  $data = Item::find($id);
  	$data->name = $request->name;
  	$data->status = $request->status;
   $data->save();
   return response()->json($data);
  }


  public function delete ($id)
   { 
    $data = Item::find($id);
    $data->delete();
    return response()->json($data);  
   } 
 

  public function inactive($id)
    {
     Item::find($id)->where('id',$id)->update(['status'=>1]);
    return response()->json(["massage" => 'data update successfully']);  
   }


    public function active($id)
   {
    $data = Item::find($id)->where('id',$id)->update(['status'=>0]);
    return response()->json($data);
   }







}
