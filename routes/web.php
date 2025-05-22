<?php

use App\Events\Messagesent;
use Illuminate\Http\Request;
use App\Events\BidPlaceEvent;
use App\Events\MessageSentEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webcontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Laravel\Reverb\Events\MessageSent as EventsMessageSent;

//Guest
Route::get('/', [GuestController::class, "index"])->name("home");
Route::get('/about', [GuestController::class, "about"])->name("about");
Route::get('/products', [GuestController::class, "products"])->name("products");
Route::get('/coming-soon', [GuestController::class, "coming_soon"])->name("coming_soon");

//Dashboard
Route::get('/dashboard', [UserController::class, "index"])->name('dashboard')->middleware(['auth', 'verified']);

//User
// Route::get('/dashboard', [UserController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/users', [UserController::class, "users"])->name('users')->middleware(['auth', 'verified']);
Route::get('/users/detail/{id}', [UserController::class, "detail"])->name('detail-user')->middleware(['auth', 'verified']);
Route::get('/users/edit/{id}', [UserController::class, "edit"])->name('edit-user')->middleware(['auth', 'verified']);
Route::get('/users/delete/{id}', [UserController::class, "delete"])->name('delete-user')->middleware(['auth', 'verified']);
Route::post('/users/store', [UserController::class, "store"])->name('store-user')->middleware(['auth', 'verified']);
Route::post('/users/update/{id}', [UserController::class, "update"])->name('update-user')->middleware(['auth', 'verified']);
Route::delete('/users/destroy/{id}', [UserController::class, "destroy"])->name('destroy-user')->middleware(['auth', 'verified']);

//Products
Route::get('/user/products', [ProductController::class, "index"])->name('user.products')->middleware(['auth', 'verified']);
Route::post('/user/products/store', [ProductController::class, "store"])->name('store-product')->middleware(['auth', 'verified']);
Route::get('/users/products/detail/{id}', [ProductController::class, "detail"])->name('detail-product')->middleware(['auth', 'verified']);
Route::get('/users/products/edit/{id}', [ProductController::class, "edit"])->name('edit-product')->middleware(['auth', 'verified']);
Route::get('/users/products/delete/{id}', [ProductController::class, "delete"])->name('delete-product')->middleware(['auth', 'verified']);
Route::post('/users/products/update/{id}', [ProductController::class, "update"])->name('update-product')->middleware(['auth', 'verified']);
Route::delete('/users/products/destroy/{id}', [ProductController::class, "destroy"])->name('destroy-product')->middleware(['auth', 'verified']);

//Transactions
Route::get('/user/transactions', [UserController::class, "transactions"])->name('transactions')->middleware(['auth', 'verified']);

//Withdraws
Route::get('/user/withdraws', [WithdrawController::class, "index"])->name('user.withdraws')->middleware(['auth', 'verified']);
Route::post('/user/withdraws/store', [WithdrawController::class, "store"])->name('store-withdraw')->middleware(['auth', 'verified']);
Route::get('/users/withdraws/approve/{id}', [WithdrawController::class, "approve"])->name('approve-withdraw')->middleware(['auth', 'verified']);
Route::post('/users/withdraws/approved/{id}', [WithdrawController::class, "approved"])->name('approved-withdraw')->middleware(['auth', 'verified']);
Route::get('/users/withdraws/reject/{id}', [WithdrawController::class, "reject"])->name('reject-withdraw')->middleware(['auth', 'verified']);
Route::post('/users/withdraws/rejected/{id}', [WithdrawController::class, "rejected"])->name('rejected-withdraw')->middleware(['auth', 'verified']);

// Profile
Route::post('/profile/update/', [ProfileController::class, "update"])->name('update-profile')->middleware(['auth', 'verified']);


//Auth
Route::get('/login', [AuthController::class, "login"])->name("login");
Route::post('/post/login', [AuthController::class, "post_login"])->name("post.login");
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register', [AuthController::class, "register"])->name("register");
Route::get('/seller/register', [AuthController::class, "register_seller"])->name("regitser-seller");


// Route untuk handle verifikasi email
Route::get('/email/verify', function () {
    return view('auth.verify-email'); // bikin file ini sendiri nanti
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // verifikasi sukses
    return redirect('/login'); // redirect setelah verifikasi
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect('/dashboard');
    }

    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//payments
Route::resource('payment', Webcontroller::class);
Route::post('/payment_post', [Webcontroller::class,'payment_post']);
Route::post('/get-snap-token', [Webcontroller::class, 'getSnapToken'])->name('getSnapToken');



//realtime
Route::get('/message', function(){
return view('message');
});

// Route::post('/bid', function(Request $request) {
//     BidPlaceEvent::dispatch($request->name, $request->price);
// })->withoutMiddleware(VerifyCsrfToken::class);

Route::post('/send-message', function(Request $request) {
    MessageSentEvent::dispatch($request->name, $request->price);
})->withoutMiddleware(VerifyCsrfToken::class);