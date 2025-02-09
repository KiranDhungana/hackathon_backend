<?php

use Illuminate\Http\Request;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendingController;
use Illuminate\Support\Facades\Route;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::post('/add-location', [VendingController::class, 'addvendinglocation']);
Route::get('/get-location', [VendingController::class, 'getvendinglocation']);

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/add-location', [VendingController::class, 'addvendinglocation']);
});