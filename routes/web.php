<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', [
    \App\Http\Controllers\HomeController::class,
    'index'
])->name('welcome');

Route::get('/tentang-blog', [
    \App\Http\Controllers\AboutController::class,
    'index'
])->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//post route
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

//dashboard route
Route::middleware('auth')->group(function() {
    Route::get('admin/dashboard', [
        \App\Http\Controllers\DashboardController::class,
        'index'
    ])->name('admin.dashboard.index');
});

//Route::get('test', function () {
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

//})->name('test');

//user route
Route::get('login', [
    \App\Http\Controllers\AuthController::class,
    'showLogin'
])->name('login');

Route::post('login', [
    \App\Http\Controllers\AuthController::class,
    'login'
])->name('login');

Route::get('register', [
    \App\Http\Controllers\AuthController::class,
    'showRegister'
])->name('register');

Route::post('register', [
    \App\Http\Controllers\AuthController::class,
    'register'
])->name('register.post');

Route::post('logout', [
    \App\Http\Controllers\Authcontroller::class,
    'logout'
])->name('logout');

Route::get('forget', [
    \App\Http\Controllers\AuthController::class,
    'showLogin'
])->name('forget');

// Route::get('forgot-password', [
//     PasswordResetLinkController::class,
//     'create'
// ])->name('password.request');

// Route::post('forgot-password', [
//     PasswordResetLinkController::class,
//     'store'
// ])->name('password.email');

// Route::get('reset-password/{token}', [
//     NewPasswordController::class,
//     'create'
// ])->name('password.reset');

// Route::post('reset-password', [
//     NewPasswordController::class,
//     'store'
// ])->name('password.update');

//profile route
// Route::middleware('auth')->group(function () {

    Route::get('profile', [
        \App\Http\Controllers\ProfileController::class,
        'show'
    ])->name('profile.show');

    Route::get('profile/edit', [
        \App\Http\Controllers\ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::put('profile', [
        \App\Http\Controllers\ProfileController::class,
        'update'
    ])->name('profile.update');
// });
