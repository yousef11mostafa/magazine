<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});




Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'save']);

Route::get('/login',[Logincontroller::class,'index'])->name("login");
Route::post('/login',[Logincontroller::class,'save'])->name("login");

Route::get("logout",[LogoutController::class,'logout'])->middleware('auth');

Route::get("admin",[AdminController::class,'index'])->middleware('auth');



Route::get("admin/posts",[AdminController::class,'posts'])->middleware('auth');
Route::get("admin/posts/{type}",[AdminController::class,'posts'])->middleware('auth');
Route::post("admin/posts/{type}",[AdminController::class,'posts'])->middleware('auth');
Route::get("admin/posts/{type}/{id}",[AdminController::class,'posts'])->middleware('auth');
Route::post("admin/posts/{type}/{id}",[AdminController::class,'posts'])->middleware('auth');




Route::get("admin/categories",[AdminController::class,'categories'])->middleware('auth');
Route::get("admin/categories/{type}",[AdminController::class,'categories'])->middleware("auth");
Route::post("admin/categories/{type}",[AdminController::class,'categories'])->middleware("auth");
Route::get("admin/categories/{type}/{id}",[AdminController::class,'categories'])->middleware("auth");
Route::post("admin/categories/{type}/{id}",[AdminController::class,'categories'])->middleware("auth");


Route::get("admin/users",[AdminController::class,'users'])->middleware('auth');
Route::get("admin/users/{type}",[AdminController::class,'users'])->middleware('auth');
Route::post("admin/users/{type}",[AdminController::class,'users'])->middleware('auth');
Route::get("admin/users/{type}/{id}",[AdminController::class,'users'])->middleware('auth');
Route::post("admin/users/{type}/{id}",[AdminController::class,'users'])->middleware('auth');
