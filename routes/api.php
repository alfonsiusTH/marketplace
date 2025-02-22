<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Authentication\AuthenticationController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/@me', [UserController::class, 'me']);
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    Route::get('/sellers', [SellerController::class, 'index']);
    Route::post('/sellers', [SellerController::class, 'store']);
});

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
