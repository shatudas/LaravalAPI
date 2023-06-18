<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use Auth;


class ItemController extends Controller
{
  public function view(){
   $data['alldata'] = Item::all();
   return view('backend.item.view_item',$data);
  }


  public function add(){
  	return view('backend.item.add_item');
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
   return redirect()->route('item.view')->with('success','Data Saved SuccessFully');
  }


   public function edit($id){
  	$editdata=Item::find($id);
   return view('backend.item.edit_item',compact('editdata'));
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
   return redirect()->route('item.view')->with('success','Data Updated SuccessFully');
  }




  public function inactive($id)
   {
    Item::find($id)->where('id',$id)->update(['status'=>1]);
    return redirect()->back();
   }
    



  public function active($id)
   {
    Item::find($id)->where('id',$id)->update(['status'=>0]);
    return redirect()->back();
   }




  public function delete ($id)
   { 
    $data = Item::find($id);
    $data->delete();
    return redirect()->route('item.view')->with('error','Data Delete Successfully');
   } 





}
