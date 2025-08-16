<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/tentang-blog', [
    \App\Http\Controllers\AboutController::class,
    'index'
])->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('posts', [
    \App\Http\Controllers\PostController::class,
    'index'
])->name('posts.index');

Route::get('/posts/{id}', [
    \App\Http\Controllers\PostController::class,
    'show'
])->name('posts.show');
