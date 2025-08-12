@extends('layouts.app')
@section('title', 'Senarai Blog Post')
@section('content')
    <div class="bg-white mb-16 text-center w-auto">
        <h1 class="text-3xl font-light tracking-wide text-gray-800 mb-4">Senarai Blog Post</h1>
        <p class="text-gray-500 text-sm">
            Platform Pembelajaran Pengaturcaraan</p>
    </div>

    <!-- Card Blog -->
    <div class="bg-white max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto w-auto">
    <!-- Grid -->
    <div class="grid lg:grid-cols-1 lg:gap-y-16 gap-10">

        @foreach ($posts as $post)

        <!-- Card -->
        <a class="group block rounded-xl overflow-hidden focus:outline-hidden" href="#">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
            <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl" src="https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Blog Image">
            </div>

            <div class="grow">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                {{ $post['title'] }}
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400">
                {{ $post['content'] }}
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-teal-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                Read more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </p>
            </div>
        </div>
        </a>
        <!-- End Card -->

        @endforeach

        <!-- Card -->
        <a class="group block rounded-xl overflow-hidden focus:outline-hidden" href="#">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
            <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl" src="https://images.unsplash.com/photo-1668906093328-99601a1aa584?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Blog Image">
            </div>

            <div class="grow">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                Onsite
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400">
                Optimize your in-person experience with best-in-class capabilities like badge printing and lead retrieval
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-teal-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                Read more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </p>
            </div>
        </div>
        </a>
        <!-- End Card -->

        <!-- Card -->
        <a class="group block rounded-xl overflow-hidden focus:outline-hidden" href="#">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
            <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl" src="https://images.unsplash.com/photo-1567016526105-22da7c13161a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Blog Image">
            </div>

            <div class="grow">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                The complete guide to OKRs
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400">
                How to make objectives and key results work for your company
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-teal-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-teal-600">
                Read more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </p>
            </div>
        </div>
        </a>
        <!-- End Card -->

        <!-- Card -->
        <a class="group block rounded-xl overflow-hidden focus:outline-hidden" href="#">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
            <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Blog Image">
            </div>

            <div class="grow">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                People program models
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400">
                Six approaches to bringing your People strategy to life
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-teal-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-teal-600">
                Read more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </p>
            </div>
        </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
@endsection
