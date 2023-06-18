<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\category;
use Auth;


class CategoryController extends Controller
{

   public function view(){
   $data['alldata'] = category::all();
   return view('backend.category.view_category',$data);
  }

  public function add(){
  	$data['item'] =Item::where('status', 0)->get();
  	return view('backend.category.add_category',$data);
  }


   public function store(Request $request){

  	$this->validate($request,[
	  'name'         =>'required',
	  'item_id'      =>'required',
	  'status'       =>'required'
	  ]);

  	$data = new category();
  	$data->name    = $request->name;
  	$data->item_id = $request->item_id;
  	$data->status  = $request->status;
   $data->save();
   return redirect()->route('category.view')->with('success','Data Saved Successfully');
  }


  public function edit($id){
   $data['editdata'] = category::find($id);
   $data['item'] =Item::where('status', 0)->get();
   return view('backend.category.edit_category',$data);
  }


  public function update(Request $request,$id){

    $this->validate($request,[
    'name'         =>'required',
    'item_id'      =>'required',
    'status'       =>'required'
    ]);

    $data = category::find($id);
    $data->name    = $request->name;
    $data->item_id = $request->item_id;
    $data->status  = $request->status;
    $data->save();
    return redirect()->route('category.view')->with('success','Data Updated SuccessFully');
  }



   public function inactive($id)
   {
    category::find($id)->where('id',$id)->update(['status'=>1]);
    return redirect()->back();
   }


  public function active($id)
   {
    category::find($id)->where('id',$id)->update(['status'=>0]);
    return redirect()->back();
   }


  public function delete ($id)
   {
    $data = category::find($id);
    $data->delete();
    return redirect()->route('category.view')->with('error','Data Delete Successfully');
   }















}
