@extends('layouts.app')

@section('content')
<div class="bg-white w-full">
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="max-w-6xl mx-auto px-6 py-5 space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
        <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                <div class="mt-2">
                    <input id="first-name" type="text" name="first-name" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="{{ $user['name'] }}"/>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" type="email" name="email" autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="{{ $user['email'] }}"/>
                </div>
            </div>

            <div>
                <label for="roles" class="block text-sm font-medium text-gray-700 mb-2">
                    Account Roles
                </label>

                <!-- Current Roles Display -->
                @if($user->roles->count() > 0)
                    <div class="mb-3">
                        <p class="text-xs text-gray-600 mb-2">Current roles:</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($user->roles as $userRole)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst($userRole->name) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <select
                    name="roles[]"
                    id="roles"
                    multiple
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('roles') border-red-300 @enderror"
                    style="min-height: 100px;"
                >
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}"
                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-1">Hold Ctrl (Windows/Linux) or Cmd (Mac) to select multiple roles</p>
                @error('roles')
                    <p class="text-red-500 text-sm mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
                @error('roles.*')
                    <p class="text-red-500 text-sm mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">

         <div class="mt-8 flex gap-3">
            <a href="{{ route('profile.show') }}" class="px-4 py-2 bg-white-600 text-gray rounded-md border border-gray-400 hover:bg-white-700 transition-colors">Kembali</a>
            <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition-colors">Update Profile</button>
        </div>
    </div>
</form>
</div>
@endsection
