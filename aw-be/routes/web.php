<?php

use App\Actions\DeleteProfile;
use App\Actions\ShowProfileForm;
use App\Actions\UpdateProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', ShowProfileForm::class)->name('profile.edit');
    Route::patch('/profile', UpdateProfile::class)->name('profile.update');
    Route::delete('/profile', DeleteProfile::class)->name('profile.destroy');
});

require __DIR__.'/auth.php';
