<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('user')->orderBy('created_at', 'desc');

        //Handle search function
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;

            //title, content, category, user
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('content', 'like', '%' . $searchTerm . '%')
                    ->orWhere('category', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%');
                    });
            });
        }

        return view('posts.index', [
            'posts' => $query->get()
        ]);
    }

    public function show($slug)
    {
        //$post = Post::where('slug', $slug)->firstOrFail();
        $post = Post::with(['user', 'comments'])->where('slug', $slug)->firstOrFail();

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create() {

        $users = User::all();
        Gate::authorize('create', Post::class);
        return view('posts.create', compact('users'));
    }

    public function store(Request $request) {

        //Input Validation.
        $validatedData = $request->validate([
            'slug' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'image' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        // if(Gate::check('is-author')) {
        //     $validatedData['user_id'] = auth()->user()->id;
        // }

        //Store data into database.
        Post::create($validatedData);

        //Return back with message.
        return back()->with('success','Post created successfully!');
    }

    public function edit($slug) {

        $post = Post::where('slug', $slug)->firstOrFail();

        Gate::authorize('update', $post);

        $users = User::all();

        return view('posts.edit', [
            'post' => $post,
            'users' => $users

        ]);
    }

    public function update(Request $request, $slug) {

        //way to debug
        //dd($slug, $request->all());

        $post = Post::where('slug', $slug)->first();
        Gate::authorize('update', $post);

        $validatedData = $request->validate([
            'slug' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'image' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        if(Gate::check('is-author')) {
            // $validatedData['user_id'] = auth()->user()->id;
            $validatedData['user_id'] = Auth::id();
        }

        $post->update($validatedData);

        return redirect()->route('posts.show', $post->slug)->with('success', 'Post updated successfully!');
    }

    public function destroy($slug) {
        $post = Post::where('slug', $slug)->firstOrFail();
        Gate::authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
