<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/models', function () {
    return view('models');
});

Route::get('/contact', function () {
    return view('contact');
});