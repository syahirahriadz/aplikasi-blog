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

Route::get('posts/create', [
    \App\Http\Controllers\PostController::class,
    'create'
])->name('posts.create');

Route::post('posts/store', [
    \App\Http\Controllers\PostController::class,
    'store'
])->name('posts.store');

// Route::get('/posts/{id}', [
//     \App\Http\Controllers\PostController::class,
//     'show'
// ])->name('posts.show');

Route::get('posts/{slug}', [
    \App\Http\Controllers\PostController::class,
    'show'
])->name('posts.show');

Route::get('posts/{slug}/edit', [
    \App\Http\Controllers\PostController::class,
    'edit'
])->name('posts.edit');

Route::put('posts/{post:slug}', [
    \App\Http\Controllers\PostController::class,
    'update'
])->name('posts.update');
