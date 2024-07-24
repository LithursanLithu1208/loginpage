<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\logincontroller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

route::get('/', function () {
    return view('welcome');
});

Route::view('register','auth.register')->middleware('guest');
Route::post('store',[RegisterController::class,'store']);

Route::view('/home','home')->middleware(['auth', 'verified']);

Route::view('login','auth.login')->middleware('guest')->name('login');
Route::post('authenticate',[logincontroller::class,'authenticate']);

Route::get('logout',[logincontroller::class,'logout']);



// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify'); //error is 403 

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
