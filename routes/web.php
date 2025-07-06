<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
    
Route::middleware(['auth'])->group(function () {
   Route::get('/personal-info', App\Livewire\PersonalInfoCunt::class)->name('personal-info');
   Route::get('/secret-info', App\Livewire\SecretInfoCunt::class)->name('secret-info');
   Route::get('/bot-config', App\Livewire\BotConfigCunt::class)->name('bot-config');
   Route::get('/question-info', App\Livewire\QuestionInfoCunt::class)->name('question-info');
   Route::get('/search-info', App\Livewire\SearchInfoCunt::class)->name('search-info');
   Route::view('/run-python', 'partials.runPython')->name('run-python');
});

require __DIR__.'/auth.php';