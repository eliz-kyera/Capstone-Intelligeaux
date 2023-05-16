<?php

use App\Http\Controllers\Authstd\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authstd\AuthenticatedSessionController;
use App\Http\Controllers\Authstd\ConfirmablePasswordController;
use App\Http\Controllers\Authstd\EmailVerificationNotificationController;
use App\Http\Controllers\Authstd\EmailVerificationPromptController;
use App\Http\Controllers\Authstd\NewPasswordController;
use App\Http\Controllers\Authstd\PasswordController;
use App\Http\Controllers\Authstd\PasswordResetLinkController;
use App\Http\Controllers\Authstd\RegisteredUserController;
use App\Http\Controllers\Authstd\StudentController;
use App\Http\Controllers\Authstd\VerifyEmailController;


// Route for Login and Register Pages for Fire Department
Route::prefix('student')->name('std.')->middleware(['guest:student'])->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

// Route for Logged in user for Fire Department



Route::prefix('student')->name('std.')->middleware(['auth.std:student'])->group(function () {

    Route::get('/dashboard', [StudentController::class, 'index'])->middleware(['verified'])->name('dashboard');

    Route::post('report', [StudentController::class, 'create'])->name('report');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});


