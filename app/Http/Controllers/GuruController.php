<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index'); // Sesuaikan dengan path view Anda
    }

    public function profile()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data guru terkait
        $guru = $user->guru;

        return view('guru.profile', compact('guru'));
    }

    public function waliKelas() 
    {
        return view('guru.datwali');
    }
}
