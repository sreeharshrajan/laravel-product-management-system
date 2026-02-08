<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Mocking Auth for now as per instructions "Auth: Laravel Inbuilt")
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin Routes
    Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
        //User Management
        Route::apiResource('users', UserController::class);

        // Product Management
        Route::apiResource('products', ProductController::class);
    });

    // Product Management (Authenticated Users - View Only)
    Route::apiResource('products', ProductController::class)->only(['index', 'show']);
});
