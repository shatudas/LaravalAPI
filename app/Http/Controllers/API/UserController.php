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

  
}
