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

Route::get('/',[App\Http\Controllers\PostController::class,'index'], function () {
    return view('post.index');
});

Route::prefix('/post')->group(function(){
  Route::get('/',[App\Http\Controllers\PostController::class,'index'])->name('post.index'); 
  Route::get('/create',[App\Http\Controllers\PostController::class,'create'])->name('post.create');           
  Route::post('/store', [App\Http\Controllers\PostController::class,'store'])->name('post.store');
  Route::get('show/{id}', [App\Http\Controllers\PostController::class,'show'])->name('post.show');
  Route::get('edit/{id}', [App\Http\Controllers\PostController::class,'edit'])->name('post.edit');
  Route::post('update/{id}', [App\Http\Controllers\PostController::class,'update'])->name('post.update');
  Route::delete('delete/{id}', [App\Http\Controllers\PostController::class,'destroy'])->name('post.delete');
});

Route::prefix('/users')->middleware('role:admin')->group(function(){
  Route::get('/',[App\Http\Controllers\UsersController::class,'index'])->name('users.index'); 
  Route::get('/create',[App\Http\Controllers\UsersController::class,'create'])->name('users.create');           
  Route::post('/store', [App\Http\Controllers\UsersController::class,'store'])->name('users.store');
  Route::get('show/{id}', [App\Http\Controllers\UsersController::class,'show'])->name('users.show');
  Route::get('edit/{id}', [App\Http\Controllers\UsersController::class,'edit'])->name('users.edit');
  Route::post('update/{id}', [App\Http\Controllers\UsersController::class,'update'])->name('users.update');
  Route::delete('delete/{id}', [App\Http\Controllers\UsersController::class,'destroy'])->name('users.delete');
});
Route::prefix('/roles')->middleware('role:admin')->group(function(){
  Route::get('/',[App\Http\Controllers\RolesController::class,'index'])->name('roles.index'); 
  Route::get('/create',[App\Http\Controllers\RolesController::class,'create'])->name('roles.create');           
  Route::post('/store', [App\Http\Controllers\RolesController::class,'store'])->name('roles.store');
  Route::get('show/{id}', [App\Http\Controllers\RolesController::class,'show'])->name('roles.show');
  Route::get('edit/{id}', [App\Http\Controllers\RolesController::class,'edit'])->name('roles.edit');
  Route::post('update/{id}', [App\Http\Controllers\RolesController::class,'update'])->name('roles.update');
  Route::delete('delete/{id}', [App\Http\Controllers\RolesController::class,'destroy'])->name('roles.delete');
});
Auth::routes(['verify' => true]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');