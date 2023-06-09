<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
  return view('auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){

//-------user---------//
Route::prefix('user')->group(function()
{
	Route::get('/view',[UserController::class,'view'])->name('user.view');
	Route::get('/add',[UserController::class,'add'])->name('user.add');
	Route::post('/store',[UserController::class,'store'])->name('user.store');
	Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.edit');
	Route::post('/update/{id}',[UserController::class,'update'])->name('user.update');
	Route::get('/delete/{id}',[UserController::class,'delete'])->name('user.delete');
	Route::get('/active/{id}',[UserController::class,'active'])->name('user.active');
	Route::get('/inactive/{id}',[UserController::class,'inactive'])->name('user.inactive');
	Route::get('/password/view',[UserController::class,'passwordview'])->name('user.password.view');
	Route::post('/profiles/password/update',[App\Http\Controllers\UserController::class,'passwordupdate'])->name('user.password.update');
});


//-------Item---------//
Route::prefix('item')->group(function()
{
	Route::get('/view',[ItemController::class,'view'])->name('item.view');
	Route::get('/add',[ItemController::class,'add'])->name('item.add');
	Route::post('/store',[ItemController::class,'store'])->name('item.store');
	Route::get('/edit/{id}',[ItemController::class,'edit'])->name('item.edit');
	Route::post('/update/{id}',[ItemController::class,'update'])->name('item.update');
	Route::get('/delete/{id}',[ItemController::class,'delete'])->name('item.delete');
	Route::get('/active/{id}',[ItemController::class,'active'])->name('item.active');
	Route::get('/inactive/{id}',[ItemController::class,'inactive'])->name('item.inactive');
});


//-------Category---------//
Route::prefix('category')->group(function()
{
	Route::get('/view',[CategoryController::class,'view'])->name('category.view');
	Route::get('/add',[CategoryController::class,'add'])->name('category.add');
	Route::post('/store',[CategoryController::class,'store'])->name('category.store');
	Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
	Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
	Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
	Route::get('/active/{id}',[CategoryController::class,'active'])->name('category.active');
	Route::get('/inactive/{id}',[CategoryController::class,'inactive'])->name('category.inactive');
});



//-------Category---------//
Route::prefix('product')->group(function()
{
	Route::get('/view',[ProductController::class,'view'])->name('product.view');
	Route::get('/add',[ProductController::class,'add'])->name('product.add');
	Route::post('/store',[ProductController::class,'store'])->name('product.store');
	Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
	Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
	Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
	Route::get('/active/{id}',[ProductController::class,'active'])->name('product.active');
	Route::get('/inactive/{id}',[ProductController::class,'inactive'])->name('product.inactive');
});


});






