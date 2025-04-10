<?php

use App\Events\Messagesent;
use Illuminate\Http\Request;
use App\Events\BidPlaceEvent;
use App\Events\MessageSentEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webcontroller;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Laravel\Reverb\Events\MessageSent as EventsMessageSent;

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


