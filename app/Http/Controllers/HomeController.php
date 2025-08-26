<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')
        ->limit(6)
        ->get();
        //return nama blade
        return view('welcome', [
            'posts' => $posts,
        ]);
    }
}
