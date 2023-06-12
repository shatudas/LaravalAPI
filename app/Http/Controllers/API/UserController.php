<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{

  public function view(){
   $data['alldata'] = User::all();
   return response()->json($data);
  }


  public function store(Request $request){
  	
  	$this->validate($request,[
	  'name'       =>'required',
	  'email'      =>'required|unique:users,email',
	  'password'   =>'required'
	  ]);

	  $data = new User();
  	$data->name = $request->name;
  	$data->email = $request->email;
  	$data->password = bcrypt($request->password);
   $data->save();
   return response()->json($data);

  }


   public function edit($id){
  	$editdata=User::find($id);
  	return response()->json($editdata);
  }



   public function update(Request $request,$id){

  	$this->validate($request,[
	  'name'       =>'required',
	  'email'      =>'required'
	  ]);

	  $data = User::find($id);
  	$data->name = $request->name;
  	$data->email = $request->email;
   $data->save();
   return response()->json($data);
  }



   public function delete ($id)
   { 
    $data = User::find($id);
    $data->delete();
    return response()->json($data);  
   } 

  
   public function inactive($id)
   {
    $data = User::find($id)->where('id',$id)->update(['status'=>1]);
    return response()->json($data);  
   }


   public function active($id)
   {
    $data = User::find($id)->where('id',$id)->update(['status'=>0]);
    return response()->json($data);
   }




  
}
