<?php

use App\Events\Messagesent;
use Illuminate\Http\Request;
use App\Events\BidPlaceEvent;
use App\Events\MessageSentEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webcontroller;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Laravel\Reverb\Events\MessageSent as EventsMessageSent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//Guest
Route::get('/', [UserController::class, "index"])->name("home");
Route::get('/about', [UserController::class, "about"])->name("about");
Route::get('/products', [UserController::class, "products"])->name("products");
Route::get('/coming-soon', [UserController::class, "coming_soon"])->name("coming_soon");

//Admin
// Route::get('/dashboard', [AdminController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [AdminController::class, "index"])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/users', [AdminController::class, "users"])->name('users')->middleware(['auth', 'verified']);

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