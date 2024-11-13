<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

Route::middleware('auth:api')->group(function (){
Route::post('logout', [AuthController::class, 'logout']);

Route::get('products' ,[ProductController::class,'index']);

Route::get('products/{id}' ,[ProductController::class,'show']);

Route::post('products/search' ,[ProductController::class,'search']);

});
