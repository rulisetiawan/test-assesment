<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('requests.index');
});

Route::get('/home', function () {
    return view('requests.index');
});

Route::get('/store', function () {
    return view('requests.store');
});