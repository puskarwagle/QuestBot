<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
Route::middleware(['auth'])->group(function () {
   Route::get('/personal-info', App\Livewire\PersonalInfoCunt::class)->name('personal-info');
   Route::get('/secret-info', App\Livewire\SecretInfoCunt::class)->name('secret-info');
   Route::get('/bot-config', App\Livewire\BotConfigCunt::class)->name('bot-config');
   Route::get('/question-info', App\Livewire\QuestionInfoCunt::class)->name('question-info');
   Route::get('/search-info', App\Livewire\SearchInfoCunt::class)->name('search-info');
});

require __DIR__.'/auth.php';