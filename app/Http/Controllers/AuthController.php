<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in
        if (auth()->attempt($validateData)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        // If login fails, redirect back with an error
        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->onlyInput('email');
    }

    // Method to log out
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
