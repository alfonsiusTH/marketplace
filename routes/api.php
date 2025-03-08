<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\Authentication\AuthenticationController;

Route::middleware('auth:sanctum')->group(function () {
    // User
    Route::get('/user/@me', [UserController::class, 'me']);
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    // Seller
    Route::get('/sellers', [SellerController::class, 'index']);
    Route::post('/sellers', [SellerController::class, 'store']);
    Route::put('/sellers/{id}', [SellerController::class, 'update']);
    Route::delete('/sellers/{id}', [SellerController::class, 'destroy']);

    // Product
    // Route::get('/products/@myProduct', [ProductController::class], 'myProduct'); // Seller Products
    Route::get('/products/{id}', [ProductController::class, 'showDetail']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);

    // CartItems
    Route::patch('/cart-items/{id}/increase', [CartItemsController::class, 'increaseQuantity']);
    Route::patch('/cart-items/{id}/decrease', [CartItemsController::class, 'decreaseQuantity']);
});
// Product (Public)
Route::get('/products', [ProductController::class, 'index']);

// Authentication
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
