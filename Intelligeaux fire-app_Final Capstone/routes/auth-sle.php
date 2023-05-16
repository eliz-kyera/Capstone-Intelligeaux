<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authsle\SleController;
use App\Http\Controllers\Authsle\ProfileController;
use App\Http\Controllers\Authsle\PasswordController;
use App\Http\Controllers\Authsle\NewPasswordController;
use App\Http\Controllers\Authsle\VerifyEmailController;
use App\Http\Controllers\Authsle\RegisteredUserController;
use App\Http\Controllers\Authsle\PasswordResetLinkController;
use App\Http\Controllers\Authsle\ConfirmablePasswordController;
use App\Http\Controllers\Authsle\AuthenticatedSessionController;
use App\Http\Controllers\Authsle\EmailVerificationPromptController;
use App\Http\Controllers\Authsle\EmailVerificationNotificationController;

Route::prefix('sle')->name('sle.')->middleware(['guest:sle'])->group(function () {
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

Route::prefix('sle')->name('sle.')->middleware(['auth.sle:sle'])->group(function () {

    Route::get('/dashboard', [SleController::class, 'index'])->middleware(['verified'])->name('dashboard');

    Route::get('view-report/{id}',[SleController::class, 'viewReport'])->name('view.report'); //show.approve.view
    Route::get('approve-report/{id}',[SleController::class, 'approveReport'])->name('approve.report');
    Route::get('reject-report/{id}',[SleController::class, 'rejectReport'])->name('reject.report');
    Route::post('approve/{id}',[SleController::class, 'approve'])->name('approve');
    Route::get('book-appointment',[SleController::class, 'showBookAppointment'])->name('show.book.appointment');
    Route::post('book-appointment',[SleController::class, 'bookAppointment'])->name('book.appointment');
    Route::get('appointments',[SleController::class, 'Appointments'])->name('appointments');
    Route::get('appointment/{id}',[SleController::class, 'ViewAppointment'])->name('view.appointment');

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