<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/template', function () {
    return view ('template');
});

Route::get('/', function () {
    $data = [
        'content'=> 'dashboard.index'
    ];
    return view('layouts.wrapper', $data);
});

// Route::get('/post', function () {
//     $data = [
//         'content'=> 'post.index'
//     ];
//     return view('layouts.wrapper', $data);
// });

Route::resource('/user', UserController::class);
