<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $roles = Role::all();
        return view('profile.show', compact('user', 'roles'));

        // $user = User::where('id', Auth::id())->firstOrFail();
        // return view('profile.show', [
        //     'user' => $user
        // ]);
    }

    public function edit()
    {
        $user = User::where('id', Auth::id())->firstOrFail();
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = User::where('id', Auth::id())->firstOrFail();

        $validatedData = $request->validate([
            'name'  => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['string', 'exists:roles,name'],
        ]);

        $user->update($validatedData);

         // Update user roles using Spatie Laravel Permission
        if ($request->has('roles')) {
            // Sync roles (remove all existing roles and assign the new ones)
            $user->syncRoles($request->roles ?? []);
        }

        return back()->with('success', 'Profile updated successfully!');
    }
}
