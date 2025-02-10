<?php

use Illuminate\Http\Request;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecycleController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\VendingController;
use Illuminate\Support\Facades\Route;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::post('/add-location', [VendingController::class, 'addvendinglocation']);
Route::get('/get-location', [VendingController::class, 'getvendinglocation']);
Route::post('/recycle-item', [RecycleController::class, 'add_recycle_item']);
Route::post('/streak', [RecycleController::class, 'streak']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
  
Route::post('/add-location', [VendingController::class, 'addvendinglocation']);
});
Route::post('/login-admin', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/super-admin', [AuthController::class, 'user']);
    Route::get('/all-user', [SuperadminController::class, 'getalluser']);
    Route::get('/leaderboard', [SuperadminController::class, 'getalluser']);
    Route::post('/add-location', [VendingController::class, 'addvendinglocation']);
    Route::get('/get-location', [VendingController::class, 'getvendinglocation']);
    });