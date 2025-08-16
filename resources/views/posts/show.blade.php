@extends('layouts.app')

@section('content')
    <div class="bg-white w-full">
        <div class="bg-white max-w-6xl mx-auto px-6 py-30 w-full">
            <h1 class="text-4xl font-bold mb-7">{{ $post->title }}</h1>
            <p class="text-gray-700 mb-4"><small>Published {{ $post->created_at->format('d M Y') }}</small></p>

            <article>
                {{ $post['content'] }}
            </article>

            <p class="text-gray-700 mb-5 py-30"><a href="{{ route('posts.index') }}">← Kembali ke Blog Posts</a></p>
        </div>
    </div>
@endsection
