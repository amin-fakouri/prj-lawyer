<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'create'])
        ->name('login');

    Route::post('/login', [UserController::class, 'login']);

Route::get('/my-login', \App\Livewire\MyLogin\MyLogin::class)->name('my_login');

//Route::middleware('auth')->group(function () {
//    Volt::route('verify-email', 'pages.auth.verify-email')
//        ->name('verification.notice');
//
//    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//        ->middleware(['signed', 'throttle:6,1'])
//        ->name('verification.verify');
//
//    Volt::route('confirm-password', 'pages.auth.confirm-password')
//        ->name('password.confirm');
});
