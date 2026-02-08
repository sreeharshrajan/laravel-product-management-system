<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Mocking Auth for now as per instructions "Auth: Laravel Inbuilt")
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin Routes
    Route::middleware(AdminMiddleware::class)->group(function () {
        // Admin User Management
        Route::apiResource('admin/users', UserController::class);
    });
});
