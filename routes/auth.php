<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Inertia\Inertia;

// Authentication routes provided by Laravel Fortify (Inertia views)
Route::get('/login', fn() => Inertia::render('auth/Login'))->name('login');
Route::post('/login', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'])->name('logout');

if (Features::enabled(Features::registration())) {
    Route::get('/register', fn() => Inertia::render('auth/Register'))->name('register');
    Route::post('/register', [\Laravel\Fortify\Http\Controllers\RegisteredUserController::class, 'store'])->name('register.store');
}

if (Features::enabled(Features::resetPasswords())) {
    Route::get('/forgot-password', fn() => Inertia::render('auth/ForgotPassword'))->name('password.request');
    Route::post('/forgot-password', [\Laravel\Fortify\Http\Controllers\PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', fn() => Inertia::render('auth/ResetPassword'))->name('password.reset');
    Route::post('/reset-password', [\Laravel\Fortify\Http\Controllers\NewPasswordController::class, 'store'])->name('password.update');
}

Route::get('/email/verify', fn() => Inertia::render('auth/VerifyEmail'))->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [\App\Http\Controllers\VerificationController::class, 'send'])->middleware('auth')->name('verification.send');

Route::get('/user/confirm-password', fn() => Inertia::render('auth/ConfirmPassword'))->middleware('auth')->name('password.confirm');
Route::post('/user/confirm-password', [\Laravel\Fortify\Http\Controllers\ConfirmablePasswordController::class, 'store'])->name('password.confirm.post');

Route::get('/two-factor-challenge', fn() => Inertia::render('auth/TwoFactorChallenge'))->name('two-factor.login');
Route::post('/two-factor-challenge', [\Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController::class, 'store'])->name('two-factor.login.post');
