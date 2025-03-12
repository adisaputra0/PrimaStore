<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');
Route::get('/seller/register', function () {
    return view('auth.register_seller');
});