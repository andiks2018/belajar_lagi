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

// pakai route ini
// Route::resource('user', UserController::class);

// dan pakai route prefix
Route::prefix('/admin')->group(function () {

    Route::resource('/user', UserController::class);
});

Route::resource('/user', UserController::class);


Route::prefix('/panel')->group(function () {

    Route::get('/berita', function () {
        return 'Hello berita';
    });
    Route::get('/olahraga', function () {
        return 'Hello olaharaga';
    });
    Route::get('/kesehatan', function () {
        return 'Hello kesehatan';
    });

});
