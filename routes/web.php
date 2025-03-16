<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

//Guest
Route::get('/', [UserController::class, "index"])->name("home");
Route::get('/about', [UserController::class, "about"])->name("about");
Route::get('/products', [UserController::class, "products"])->name("products");
Route::get('/coming-soon', [UserController::class, "coming_soon"])->name("coming_soon");

//Admin
Route::get('/dashboard', [AdminController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');

//Auth
Route::get('/seller/register', [AuthController::class, "register_seller"])->name("regitser-seller");