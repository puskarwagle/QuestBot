<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/personal-info', [PersonalInfoController::class, 'index']);
Route::post('/personal-info', [PersonalInfoController::class, 'store']);

require __DIR__.'/auth.php';