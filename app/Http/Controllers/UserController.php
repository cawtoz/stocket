<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users (including soft-deleted ones).
     */
    public function index()
    {
        $users = User::withoutTrashed()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user details.
     */
    public function show(User $user)
    {
        $user->load('roles', 'permissions');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in the database.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
        ]);
        $user->update($request->only(['name', 'email']));
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Soft delete the specified user.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Restore a soft-deleted user.
     */
    public function restore($id)
    {
        User::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('users.index')->with('success', 'User restored successfully.');
    }

    /**
     * Permanently delete a user from the database.
     */
    public function forceDelete($id)
    {
        User::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('users.index')->with('success', 'User permanently deleted.');
    }


    /**
     * Display a listing of the trashed users.
     */
    public function trash()
    {
        $users = User::onlyTrashed()->paginate(10);
        return view('users.trash', compact('users'));
    }

}
