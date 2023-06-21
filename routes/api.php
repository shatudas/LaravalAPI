<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;


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



//-------Item---------//
Route::prefix('item')->group(function()
{
	Route::get('/view',[ItemController::class,'view']);
	Route::get('/add',[ItemController::class,'add']);
	Route::post('/store',[ItemController::class,'store']);
	Route::get('/edit/{id}',[ItemController::class,'edit']);
	Route::post('/update/{id}',[ItemController::class,'update']);
	Route::get('/delete/{id}',[ItemController::class,'delete']);
	Route::get('/active/{id}',[ItemController::class,'active']);
	Route::get('/inactive/{id}',[ItemController::class,'inactive']);
});


//-------Category---------//
Route::prefix('category')->group(function()
{
	Route::get('/view',[CategoryController::class,'view']);
	Route::get('/add',[CategoryController::class,'add']);
	Route::post('/store',[CategoryController::class,'store']);
	Route::get('/edit/{id}',[CategoryController::class,'edit']);
	Route::post('/update/{id}',[CategoryController::class,'update']);
	Route::get('/delete/{id}',[CategoryController::class,'delete']);
	Route::get('/active/{id}',[CategoryController::class,'active']);
	Route::get('/inactive/{id}',[CategoryController::class,'inactive']);
});



//-------Category---------//
Route::prefix('product')->group(function()
{
	Route::get('/view',[ProductController::class,'view']);
	Route::get('/add',[ProductController::class,'add']);
	Route::post('/store',[ProductController::class,'store']);
	Route::get('/edit/{id}',[ProductController::class,'edit']);
	Route::post('/update/{id}',[ProductController::class,'update']);
	Route::get('/delete/{id}',[ProductController::class,'delete']);
	Route::get('/active/{id}',[ProductController::class,'active']);
	Route::get('/inactive/{id}',[ProductController::class,'inactive']);
});








