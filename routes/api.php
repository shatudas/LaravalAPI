<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
 return $request->user();



 

 
});


//-------user---------//
Route::prefix('user')->group(function()
{
	Route::get('/view',[UserController::class,'view']);
	Route::get('/add',[UserController::class,'add']);
	Route::post('/store',[UserController::class,'store']);
	Route::get('/edit/{id}',[UserController::class,'edit']);
	Route::post('/update/{id}',[UserController::class,'update']);
	Route::get('/delete/{id}',[UserController::class,'delete']);
	Route::get('/active/{id}',[UserController::class,'active']);
	Route::get('/inactive/{id}',[UserController::class,'inactive']);
	Route::get('/password/view',[UserController::class,'passwordview']);
	Route::post('/profiles/password/update',[UserController::class,'passwordupdate']);
});



