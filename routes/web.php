<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/tentang-blog', function () {
    return view('tentang-blog');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/index', function () {
    return view('index');
})->name('posts');
