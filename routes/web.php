<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RajaStoreController;
use Illuminate\Support\Facades\Route;


//auth routes

Route::get('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::get('/',[RajaStoreController::class, 'index'])->name('home');

