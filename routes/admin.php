<?php


use Illuminate\Support\Facades\Route;


Route::get('/admins', function(){
    return response([
        'status' => 'success',
        'message' => 'Admin Routes'
    ]);
});