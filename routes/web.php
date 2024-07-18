<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'requestPassword'])
        ->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail'])
        ->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])
        ->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'resetPasswordPost'])
        ->name('password.update');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/auth/google', [GoogleController::class, 'googlePage'])->name('google');
Route::get('/auth/google/callback', [GoogleController::class, 'googleCallBack']);


Route::post('/register', [RegisterController::class, 'store'])->name('registerPost');

Route::get('/dashboard', [RequestController::class, 'index'])->middleware('auth')->name('dashboard');
