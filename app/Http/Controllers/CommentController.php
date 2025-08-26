<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Optional: require login to comment
    // public function __construct() { $this->middleware('auth')->only(['store','destroy']); }

    public function store(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email|max:255',
        ]);

        Comment::create([
            'content' => $validated['content'],
            'author_name' => $validated['author_name'],
            'author_email' => $validated['author_email'],
            'post_id' => $post->id,
            'user_id' => Auth::id(), // Will be null if user is not authenticated
        ]);

        return redirect()->route('posts.show', $slug)
            ->with('success', 'Comment added successfully!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Only allow deletion if user owns the comment or is admin
        if (Auth::check() && Auth::id() === $comment->user_id) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully!');
        }

        return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
    }
}
