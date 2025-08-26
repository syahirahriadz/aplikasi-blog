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

                <div class="pt-10 flex justify-between items-center mt-8">
                    <a href="{{ route('posts.index') }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:border-teal-600 hover:text-teal-600 focus:outline-hidden focus:border-teal-600 focus:text-teal-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-teal-500 dark:hover:border-teal-600 dark:focus:text-teal-500 dark:focus:border-teal-600">
                        <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                        </svg>
                        Kembali ke Blog Posts
                    </a>

                    <div class="flex gap-3">

                        <a href="{{ route('posts.edit', $post->slug) }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:border-teal-600 hover:text-teal-600 focus:outline-hidden focus:border-teal-600 focus:text-teal-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-teal-500 dark:hover:border-teal-600 dark:focus:text-teal-500 dark:focus:border-teal-600">
                            <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                            Edit
                        </a>

                        <form action="{{ route('posts.destroy', $post['slug']) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div> {{-- End button --}}

                {{-- Flash
                @if(session('success'))
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-700">{{ session('success') }}</div>
                @endif --}}

                <!-- Comments Section -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">
                            Comments ({{ $post->comments->count() }})
                        </h3>

                        <!-- Comment Form -->
                        <div class="bg-gray-50 rounded-lg p-6 mb-8">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Leave a Comment</h4>

                            @if (session('success'))
                                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="space-y-4">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="author_name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                                        <input type="text"
                                            id="author_name"
                                            name="author_name"
                                            value="{{ old('author_name') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('author_name') border-red-500 @enderror"
                                            required>
                                        @error('author_name')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="author_email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                        <input type="email"
                                            id="author_email"
                                            name="author_email"
                                            value="{{ old('author_email') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('author_email') border-red-500 @enderror"
                                            required>
                                        @error('author_email')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Comment *</label>
                                    <textarea id="content"
                                            name="content"
                                            rows="4"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-600 focus:border-teal-600 @error('content') border-red-500 @enderror"
                                            placeholder="Write your comment here..."
                                            required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Post Comment
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Comments List -->
                        @if($post->comments->count() > 0)
                            <div class="space-y-6">
                                @foreach($post->comments as $comment)
                                    <div class="bg-white rounded-lg border border-gray-200 p-6">
                                        <div class="flex items-start justify-between">
                                            <div class="flex items-center space-x-3 mb-3">
                                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                                    <span class="text-white font-semibold text-sm">
                                                        {{ strtoupper(substr($comment->author_name, 0, 1)) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <h5 class="font-semibold text-gray-900">{{ $comment->author_name }}</h5>
                                                    <p class="text-sm text-gray-500">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>

                                            @auth
                                                @if(Auth::id() === $comment->user_id)
                                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline-block"
                                                        onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="text-red-600 hover:text-red-800 text-sm">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>

                                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                                            {{ $comment->content }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No comments yet</h3>
                                <p class="mt-1 text-sm text-gray-500">Be the first to share your thoughts!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection
