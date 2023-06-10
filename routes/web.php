<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//-------user---------//
Route::prefix('user')->group(function()
{
	Route::get('/view',[App\Http\Controllers\UserController::class,'view'])->name('user.view');
	Route::get('/add',[App\Http\Controllers\UserController::class,'add'])->name('user.add');
	Route::post('/store',[App\Http\Controllers\UserController::class,'store'])->name('user.store');
	Route::get('/edit/{id}',[App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
	Route::post('/update/{id}',[App\Http\Controllers\UserController::class,'update'])->name('user.update');
	Route::get('/delete/{id}',[App\Http\Controllers\UserController::class,'delete'])->name('user.delete');
	Route::get('/active/{id}',[App\Http\Controllers\UserController::class,'active'])->name('user.active');
	Route::get('/inactive/{id}',[App\Http\Controllers\UserController::class,'inactive'])->name('user.inactive');
	Route::get('/password/view',[App\Http\Controllers\UserController::class,'passwordview'])->name('user.password.view');
	Route::post('/profiles/password/update',[App\Http\Controllers\UserController::class,'passwordupdate'])->name('user.password.update');
});






