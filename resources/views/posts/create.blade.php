@extends('layouts.app')
@section('title', 'Create Post')

@section('content')

    <div class="bg-white w-full">
        <div class="max-w-6xl mx-auto px-6 py-30">

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('title') }}">
                     @error('title')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('slug') }}">
                    @error('slug')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('content') }}"></textarea>
                    @error('content')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('author') }}">
                    @error('author')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="author_info" class="block text-sm font-medium text-gray-700">Author Info</label>
                    <input type="text" name="author_info" id="author_info" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('author_info') }}">
                    @error('author_info')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="text" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('image') }}">
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <input type="text" name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" value="{{ old('category') }}">
                    @error('category')
                        <span class="text-red-500 text-sm">{{ $message}}</span>
                    @enderror
                </div>

                @if (session('success'))
                    <div class="mb-4">
                        <span class="text-green-500 text-sm">{{session('success')}}</span>
                    </div>
                @endif

                <div class="mt-8">
                    <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition-colors">Create Post</button>
                </div>
            </form>
        </div>
    </div>

@endsection
