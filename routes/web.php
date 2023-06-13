<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;


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


});






