<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Sesuaikan dengan path view Anda
    }

    //tampilan untuk guru
    public function index1()
    {
        $gurus = Guru::all();
        return view('admin.teacher.index', compact('gurus'));
    }
    public function create1()
    {
        return view('admin.teacher.create');
    }

    public function store1(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus,nip',
            'nama' => 'required',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
        ]);

        Guru::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Data Guru berhasil ditambahkan.');
    }

    //tampilan untuk siswa
    public function index2()
    {
        $siswas = siswa::all();
        return view('admin.student.index', compact('siswas'));
    }
    public function create2()
    {
        return view('admin.student.create');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:gurus,nip',
            'nama' => 'required',
            'email' => 'nullable|email',
            'kelas' => 'nullable',
        ]);

        Siswa::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }
}
