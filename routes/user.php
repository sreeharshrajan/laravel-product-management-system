<?php


use Illuminate\Support\Facades\Route;


Route::get('/users', function () {
    return response([
        'status' => 'success',
        'message' => 'User Routes'
    ]);
});
