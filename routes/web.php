<?php

use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\HomeController as HomeHomeController;
use App\Http\Controllers\User\PostController;
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

// Route::get('/', function () {
//     return "Hello Word";
// });

// Home view
Route::get('/',[HomeController::class,'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeHomeController::class, 'index'])->name('user.dashboard');

// post
Route::get('/post/create',[PostController::class,'index'])->name('post.create');
Route::post('/post/store',[PostController::class,'store'])->name('post.store');
Route::get('/post/edit/{id}',[PostController::class,'update'])->name('post.edit');
Route::get('/post/show/{id}',[PostController::class,'show'])->name('post.show');

// add comment
Route::post('/comment/post/{id}',[CommentController::class,'store'])->name('comment.store');

// hide comment
Route::get('/comment/hide/{id}',[CommentController::class,'hide'])->name('comment.hide');


require('web_admin.php');
