<?php

use App\Http\Controllers\Webcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');
Route::get('/seller/register', function () {
    return view('auth.register_seller');
});

//payments
Route::resource('payment', Webcontroller::class);