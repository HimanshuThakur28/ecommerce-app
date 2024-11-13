<?php

use App\Http\Controllers\FrontendAuthController;
use App\Http\Controllers\FrontendCartController;
use App\Http\Controllers\FrontendProductController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[FrontendAuthController::class ,'showLoginForm'])->name('login');
Route::get('/register',[FrontendAuthController::class ,'showRegistrationForm'])->name('register');
Route::get('/logout' , [FrontendAuthController::class,'logout'])->name('logout');
Route::get('/',[FrontendProductController::class,'index'])->name('home');
Route::get('products/{id}',[FrontendProductController::class,'show'])->name('product.show');
Route::get('/cart}',[FrontendCartController::class,'index'])->name('cart');
Route::post('/cart/add',[FrontendCartController::class,'add'])->name('cart.add');

