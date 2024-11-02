<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Symfony\Component\HttpKernel\Profiler\Profile;

// Api for login
Route::prefix('v1')->group(function () {
    Route::middleware('auth:api')->group(function () {
        
        // Api for product
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/search/{query}', [ProductController::class, 'search'])->name('products.search');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/category/{category_id}', [ProductController::class, 'getByCategories'])->name('products.getbycategories');
        Route::get('/products/subcategory/{subcategory_id}', [ProductController::class, 'getBySubCategories'])->name('products.getbysubcategories');
        
        // Api for categories
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        // Route::get('/subcategories', [Subcategory::class, 'index'])->name('subcategories.index');
    
        // Api for order
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/history', [OrderController::class, 'getHistory']);
        Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
        
        // Api for review
        Route::post('/review', [ReviewController::class, 'store']);

        // Api for wishlist
        Route::post('/wishlist', [WishlistController::class, 'store']);
        Route::get('/wishlist', [WishlistController::class, 'index']);
        Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy']);
    
        // Api for auth
        Route::post('/logout', [AuthController::class, 'logout']);

        // Api for profile
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::put('/profile/update', [ProfileController::class, 'update']);

        // Api for admin
        Route::middleware('checkRole:admin')->group(function () {
            // Admin api for product
            Route::post('/products', [ProductController::class, 'store'])->name('products.store');
            Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
            
            // Admin api for category
            Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/categories/{id}', [CategoryController::class, 'show']);
            Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

            // Admin api for subcategory
            Route::post('/subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');
            Route::get('/subcategories/{id}', [SubcategoryController::class, 'show']);
            Route::put('/subcategories/{id}', [SubcategoryController::class, 'update'])->name('subcategories.update');
            Route::delete('/subcategories/{id}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');
            
            // Admin api for order
            Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
            
            // Admin api for order
            Route::put('/orders/{id}', [CategoryController::class, 'update'])->name('orders.update');
            Route::delete('/orders/{id}', [CategoryController::class, 'destroy'])->name('orders.destroy');

            // Admin api for user management
            Route::get('/users', [UserController::class, 'index']);
            Route::post('/users', [UserController::class, 'store']);
            Route::put('/users/{id}', [UserController::class, 'update']);
            Route::delete('/users/{id}', [UserController::class, 'destroy']);
        });
    });
    
    
    
    // Api for auth
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});