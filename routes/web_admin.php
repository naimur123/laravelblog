<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login',[LoginController::class,'showloginform'])->name('admin.login');
Route::post('/admin/login',[LoginController::class, 'login'])->name('admin.login');

// Route::get('/admin/home')
Route::middleware(["auth:admin"])->group(function(){
    Route::get('/admin/home', [LoginController::class, 'dashboard'])->name('admin.home');
    Route::get('logout',[LoginController::class, 'logout'])->name('admin.logout');
});

Route::get('/post/hide/{id}',[HomeController::class,'hide'])->name('post.hide');
