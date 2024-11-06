<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Method to display the login form
    public function showFormLogin()
    {
        return view('auth.login');
    }

    // Method to handle login
    public function login(Request $request)
    {
        // Validation
        $validateData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in with the 'petugas' guard
        if (Auth::guard('petugas')->attempt(['username' => $validateData['username'], 'password' => $validateData['password']])) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil.');
        }

        // If login fails, redirect back with an error
        return back()->withErrors([
            'username' => 'Username atau password salah!',
        ])->onlyInput('username');
    }


    // Method to log out
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
