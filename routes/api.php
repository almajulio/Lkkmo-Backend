<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::apiResource('/products', \App\Http\Controllers\ProductController::class);

