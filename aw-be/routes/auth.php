<?php

use App\Actions\Auth\ConfirmPassword;
use App\Actions\Auth\LoginUser;
use App\Actions\Auth\LogoutUser;
use App\Actions\Auth\RegisterUser;
use App\Actions\Auth\ResetPassword;
use App\Actions\Auth\SendEmailVerificationNotification;
use App\Actions\Auth\SendPasswordResetLink;
use App\Actions\Auth\ShowConfirmPasswordForm;
use App\Actions\Auth\ShowEmailVerificationPrompt;
use App\Actions\Auth\ShowForgotPasswordForm;
use App\Actions\Auth\ShowLoginForm;
use App\Actions\Auth\ShowRegistrationForm;
use App\Actions\Auth\ShowResetPasswordForm;
use App\Actions\Auth\UpdatePassword;
use App\Actions\Auth\VerifyEmail;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', ShowRegistrationForm::class)
        ->name('register');

    Route::post('register', RegisterUser::class);

    Route::get('login', ShowLoginForm::class)
        ->name('login');

    Route::post('login', LoginUser::class);

    Route::get('forgot-password', ShowForgotPasswordForm::class)
        ->name('password.request');

    Route::post('forgot-password', SendPasswordResetLink::class)
        ->name('password.email');

    Route::get('reset-password/{token}', ShowResetPasswordForm::class)
        ->name('password.reset');

    Route::post('reset-password', ResetPassword::class)
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', ShowEmailVerificationPrompt::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmail::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', SendEmailVerificationNotification::class)
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', ShowConfirmPasswordForm::class)
        ->name('password.confirm');

    Route::post('confirm-password', ConfirmPassword::class);

    Route::put('password', UpdatePassword::class)->name('password.update');

    Route::post('logout', LogoutUser::class)
        ->name('logout');
});
