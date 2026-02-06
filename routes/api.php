<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response([
        'status' => 'success',
        'message' => 'API Routes'
    ]);
});