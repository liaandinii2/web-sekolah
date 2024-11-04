<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(5);

        return view('admin.manajemen-admin.index', [
            'title' => 'Manajemen Admin',
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('admin.manajemen-admin.create');
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create user: ' . $e->getMessage()]);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    // Display the specified user
    public function show(User $user)
    {
        return view('admin.manajemen-admin.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user by ID or fail
        return view('admin.manajemen-admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Ensure the email is unique, excluding the current user
            'password' => 'nullable|string|min:8', // Password is optional; use current if empty
        ]);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // Hash the new password if it was provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Save changes to the database

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
