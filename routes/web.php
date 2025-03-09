<?php

use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthenticationController::class, 'Login'])->name('login');
Route::get('register', [AuthenticationController::class, 'showRegister'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard_toko', [ProductController::class, 'index'])->name('toko_dashboard');
    Route::get('/detail_product/{id}', [ProductController::class, 'showDetail'])->name('detail_toko');

    Route::get('/register_toko', [SellerController::class,  'create'])->name('register_toko');
});
