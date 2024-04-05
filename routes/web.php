<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login/do', [AuthController::class, 'doLogin']);

Route::get('/template', function () {
    return view ('template');
});

Route::get('/', function () {
    $data = [
        'content'=> 'dashboard.index'
    ];
    return view('layouts.wrapper', $data);
});

Route::resource('/user', UserController::class);
