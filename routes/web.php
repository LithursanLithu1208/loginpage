<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\logincontroller;

route::get('/', function () {
    return view('welcome');
});

Route::view('register','auth.register')->middleware('guest');
Route::post('store',[RegisterController::class,'store']);

Route::view('/home','home')->middleware('auth');

Route::view('login','auth.login')->middleware('guest')->name('login');
Route::post('authenticate',[logincontroller::class,'authenticate']);

Route::get('logout',[logincontroller::class,'logout']);