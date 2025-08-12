<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        //return nama blade
        return view('tentang-blog');
    }

}
