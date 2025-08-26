<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('posts/{slug}', [
    \App\Http\Controllers\PostController::class,
    'show'
])->name('posts.show');

Route::get('posts/{slug}/edit', [
    \App\Http\Controllers\PostController::class,
    'edit'
])->name('posts.edit');

Route::put('posts/{slug}', [
    \App\Http\Controllers\PostController::class,
    'update'
])->name('posts.update');

Route::delete('posts/{slug}', [
    \App\Http\Controllers\PostController::class,
    'destroy'
])->name('posts.destroy');

//comment route
Route::post('/posts/{slug}/comments', [
    \App\Http\Controllers\CommentController::class,
    'store'
])->name('comments.store');

Route::delete('/comments/{id}', [
    \App\Http\Controllers\CommentController::class,
    'destroy'
])->name('comments.destroy');

Route::get('admin/dashboard', [
    \App\Http\Controllers\DashboardController::class,
    'index'
])->name('admin.dashboard.index');

Route::get('test', function () {
    //ambil semua data
    // $posts = \App\Models\Post::all();
    // dd($posts);

    //ambil data ikut syarat
    // $posts = \App\Models\Post::where('category', 'Pengaturcaraan')->get();
    // dd($posts);

    //susun data
    //$posts = \App\Models\Post::orderBy('created_at','desc')->get();
    // dd($posts);

    //limitkkan data
    //$posts = \App\Models\Post::limit(10)->get();
    // dd($posts);

    //pilih column tertentu
    //$posts = \App\Models\Post::select('title', 'created_at')->get();
    // dd($posts);

})->name('test');
