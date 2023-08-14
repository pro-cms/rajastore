<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RajaStoreController;
use Illuminate\Support\Facades\Route;


//auth routes

Route::get('login',[AuthController::class,'login'])->middleware('guest')->name('login');
Route::post('login',[AuthController::class,'login'])->middleware('guest')->name('login');
Route::get('register',[AuthController::class,'register'])->middleware('guest')->name('register');
Route::post('register',[AuthController::class,'register'])->middleware('guest')->name('register');

Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::get('/',[RajaStoreController::class, 'index'])->name('home');

Route::post('/save-product',[RajaStoreController::class,'saveProduct'])->name('saveProduct');

