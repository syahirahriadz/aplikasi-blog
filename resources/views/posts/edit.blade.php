@extends('layouts.app')
@section('title', 'Update Post')

@section('content')

    <div class="bg-white w-full">
        <div class="max-w-6xl mx-auto px-6 py-30">

            <form action="{{ route('posts.update', $post->slug) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('title', $post->title) }}">
                     @error('title')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('slug', $post->slug) }}">
                    @error('slug')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <!-- Author Information Section -->
                <div class="space-y-6">
                    <div class="border-b border-gray-100 pb-4">
                        <h2 class="text-lg font-medium text-gray-900">Author Information</h2>
                        <p class="text-sm text-gray-500 mt-1">Select the author for this post</p>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Author
                            </label>
                            <select
                                name="user_id"
                                id="user_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('user_id') border-red-300 @enderror"
                                @can('is-author') disabled @endcan

                            >
                                <option value="">Select an author (optional)</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Author Image URL
                        </label>
                        <input
                            type="url"
                            name="image"
                            id="image"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('image') border-red-300 @enderror"
                            value="{{ old('image', $post->image) }}"
                            placeholder="https://example.com/author-photo.jpg"
                        >
                        <p class="text-xs text-gray-500 mt-1">Provide a URL to the author's profile picture</p>
                        @error('image')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="mb-5 py-5">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <input type="text" name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('category', $post->category) }}">
                    @error('category')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                @if (session('success'))
                    <div class="mb-4">
                        <span class="text-green-500 text-sm">{{session('success')}}</span>
                    </div>
                @endif

                <div class="mt-8 flex gap-3">
                    <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-white-600 text-gray rounded-md border border-gray-400 hover:bg-white-700 transition-colors">Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition-colors">Update Post</button>
                </div>
            </form>
        </div>
    </div>

@endsection
