<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UseramountController;

// Public Routes

Route::get('password/reset', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordController::class, 'reset'])->name('password.update');
Route::get('/pay/{id}', [UseramountController::class, 'gotopay']);
Route::get('/', [UseramountController::class, 'home']);
Route::get("/paymentsuccess", [UseramountController::class, 'payment'])->name('payment');