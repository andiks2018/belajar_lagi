<?php

use Illuminate\Support\Facades\Route;

Route::get('/template', function () {
    return view('template');
});

Route::get('/', function () {
    $data = [
        'content'=> 'user.index'
    ];
    return view('layouts.wrapper', $data);
});

Route::get('/user', function () {
    $data = [
        'content'=> 'user.index'
    ];
    return view('layouts.wrapper', $data);
});

Route::get('/post', function () {
    $data = [
        'content'=> 'post.index'
    ];
    return view('layouts.wrapper', $data);
});

