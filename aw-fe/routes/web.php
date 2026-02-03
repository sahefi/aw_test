<?php

use App\Actions\ShowProfileForm;
use App\Actions\UpdateProfile;
use App\Actions\DeleteUserProfile;
use App\Actions\ShowWeatherSearch;
use App\Actions\SearchWeather;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/weather-app', function () {
    return view('weather');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', ShowProfileForm::class)->name('profile.edit');
    Route::patch('/profile', UpdateProfile::class)->name('profile.update');
    Route::delete('/profile', DeleteUserProfile::class)->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/weather', ShowWeatherSearch::class)->name('weather.search');
    Route::post('/weather', SearchWeather::class)->name('weather.search.post');
});

require __DIR__.'/auth.php';
