<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
use App\Http\Controllers\PersonalInfoController;
Route::middleware(['auth'])->group(function () {
    Route::get('/personal-info', [PersonalInfoController::class, 'index'])->name('personal-info.index');
    Route::post('/personal-info', [PersonalInfoController::class, 'store'])->name('personal-info.store');
});

require __DIR__.'/auth.php';