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
    Route::put('/sellers/{id}', [SellerController::class, 'update'])->middleware('SellerMiddleware');
    Route::delete('/sellers/{id}', [SellerController::class, 'destroy'])->middleware('SellerMiddleware');

    // Product
    Route::get('/products/owner', [ProductController::class, 'showSellerProducts']);
    Route::get('/products/{id}', [ProductController::class, 'showDetail'])->middleware('ProductOwner');
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/products/{id}', [ProductController::class, 'update'])->middleware('ProductOwner');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('ProductOwner');

    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'addToCart'])->middleware('CartMiddleware');
    
    // CartItems
    Route::patch('/cart-items/{id}/increase', [CartItemsController::class, 'increaseQuantity'])->middleware('CartItemsMiddleware');
    Route::patch('/cart-items/{id}/decrease', [CartItemsController::class, 'decreaseQuantity'])->middleware('CartItemsMiddleware');
    Route::delete('/cart-items/{id}', [CartItemsController::class, 'destroy'])->middleware('CartItemsMiddleware');
});
// Product (Public)
Route::get('/products', [ProductController::class, 'index']);

// Authentication
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
