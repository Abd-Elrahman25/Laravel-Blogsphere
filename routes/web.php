<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[PostsController::class,'index'])->name('posts.index');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[logoutController::class,'store'])->name('logout');

Route::get('/posts/create',[PostsController::class,'create'])->name('posts.create');

Route::get('/posts/{post}/edit',[PostsController::class,'edit'])->name('posts.edit');

Route::post('/posts',[PostsController::class,'store'])->name('posts.store');

Route::get('/posts/{post}',[PostsController::class,'show'])->name('posts.show');

Route::put('posts/{post}',[PostsController::class,'update'])->name('posts.update');

Route::delete('posts/{post}',[PostsController::class,'destroy'])->name('posts.destroy');

