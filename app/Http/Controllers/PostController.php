<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    // public function show($id)
    // {
    //     $post = Post::findOrFail($id);
    //     return view('posts.show', [
    //         'post' => $post
    //     ]);
    // }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {

        //Input Validation.
        $validatedData = $request->validate([
            'slug' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'author_info' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            //'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'nullable|string|max:255',
        ]);
        //Store data into database.
        Post::create($validatedData);

        //Return back with message.
        return back()->with('success','Post created successfully!');
    }

    public function edit($slug) {

        $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post) {

        //$post = Post::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'slug' => ['required','string','max:255', Rule::unique('posts','slug')->ignore($post->id)],
            'title' => ['required','string','max:255'],
            'content' => ['required','string'],
            'author' => ['required','string','max:255'],
            'author_info' => ['nullable','string','max:255'],
            'image' => ['nullable','string','max:255'],
            //'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => ['nullable','string','max:255'],
        ]);

        $post->update($validated);

        return redirect()
            ->route('posts.show', $post->slug)
            ->with('success', 'Post updated successfully!');
    }

    public function destroy() {

    }
}
