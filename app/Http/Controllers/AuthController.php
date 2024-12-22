<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $role = Auth::user()->role;

            // Redirect berdasarkan role
            if ($role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($role === 'guru') {
                return redirect()->route('guru.index');
            } elseif ($role === 'user') {
                return redirect()->route('user.index');
            }
        }

        // Jika autentikasi gagal
        return back()->withErrors(['loginError' => 'Username atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
