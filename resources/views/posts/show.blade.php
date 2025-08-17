@extends('layouts.app')

@section('content')
    <div class="bg-white w-full">
        <div class="max-w-6xl mx-auto px-6 py-30">
             <article>
                <h1 class="text-6xl font-bold mb-7">{{ $post->title }}</h1>
                <div class="flex items-center gap-x-3 text-base mb-7">
                    <time datetime="2024-12-15" class="text-gray-400">{{ \Carbon\Carbon::parse($post['created_at'])->format('j M Y') }}</time>
                    <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs">{{ $post['category'] }}</span>
                </div>

                <p class="text-xl text-gray-600 leading-relaxed">{{ $post['content'] }}</p>

                <div class="flex items-center gap-x-3 pt-15">
                    <img src="{{ $post['image'] }}" alt="" class="w-8 h-8 rounded-full" />
                    <div class="text-xm">
                        <p class="font-medium text-gray-900">Ditulis oleh {{ $post['author'] }} ({{ $post['author_info'] }})</p>
                    </div>
                </div>

                <div class="mt-10 pt-10">
                    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:underline">
                        ← Kembali ke Blog Posts
                    </a>
                </div>
                <div class="mt-10 pt-10">
                    <a href="{{ route('posts.edit', $post->slug) }}" class="text-teal-600 hover:underline">Edit</a>
                </div>
            </article>
        </div>
    </div>
@endsection
