<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// Api for user
Route::middleware('auth:api')->group(function () {
    // Api for product
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    
    // Api for categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    // Api for order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    // Api for review
    Route::post('/review', [ReviewController::class, 'store']);

    // Api for auth
    Route::post('/logout', [AuthController::class, 'logout']);
});


// Api for admin
Route::middleware('checkRole:admin')->group(function () {
    // Admin api for product
    Route::post('/products/{id}', [AuthController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [AuthController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [AuthController::class, 'destroy'])->name('products.destroy');
    
    // Admin api for category
    Route::post('/categories/{id}', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
    // Admin api for order
    Route::post('/orders/{id}', [CategoryController::class, 'store'])->name('orders.store');
    Route::put('/orders/{id}', [CategoryController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [CategoryController::class, 'destroy'])->name('orders.destroy');
});

// Api for auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);