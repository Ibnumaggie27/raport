<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Mapel;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Sesuaikan dengan path view Anda
    }

    //tampilan untuk guru
    public function index1()
    {
        $gurus = Guru::paginate(10);
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

        return redirect()->route('teacher.index')->with('success', 'Data Guru berhasil ditambahkan.');
    }
    public function edit1($id)
    {
        $gurus = guru::findOrFail($id);
        return view('admin.teacher.edit', compact('gurus'));
    }
    public function update1(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nip' => 'required|string|max:255|unique:gurus,nip,' . $id,
        'email' => 'nullable|email|max:100',
        'alamat' => 'required|string',
    ]);

    $gurus = guru::findOrFail($id);

    DB::transaction(function () use ($request, $gurus) {
        // Update data guru
        $gurus->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
    });

    return redirect()->route('teacher.index')->with('success', 'Data guru berhasil diperbarui.');
}

public function destroy1($id)
{
    $gurus = guru::findOrFail($id);
    $gurus->delete();
    return redirect()->route('teacher.index')->with('success', 'Data Guru berhasil dihapus.');
}

    //tampilan untuk siswa
    public function index2()
    {
        $siswas = siswa::paginate(10);
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

        return redirect()->route('student.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }
    
    public function edit2($id)
    {
        $siswas = siswa::findOrFail($id);
        return view('admin.student.edit', compact('siswas'));
    }
    public function update2(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nis' => 'required|string|max:255|unique:siswas,nis,' . $id,
        'email' => 'nullable|email|max:100',
        'kelas' => 'required|string',
    ]);

    $siswas = siswa::findOrFail($id);

    DB::transaction(function () use ($request, $siswas) {
        // Update data guru
        $siswas->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'email' => $request->email,
            'kelas' => $request->kelas,
        ]);
    });

    return redirect()->route('student.index')->with('success', 'Data Siswa berhasil diperbarui.');
}

public function destroy2($id)
{
    $siswas = siswa::findOrFail($id);
    $siswas->delete();
    return redirect()->route('student.index')->with('success', 'Data siswa berhasil dihapus.');
}

    // start tampilan untuk mapel
    public function index3() {
        $mapels = Mapel::all();
        return view('admin.mapel.index', compact('mapels'));
    }

    public function create3() {
        return view('admin.mapel.create');
    }

    public function store3(Request $request) {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        Mapel::create($request->all());

        return redirect()->route('mapel.index')->with('success', 'Data Mapel berhasil ditambahkan.');
    }
    
    public function edit3($id)
    {
        $mapels = Mapel::findOrFail($id);
        return view('admin.mapel.edit', compact('mapels'));
    }
    public function update3(Request $request, $id)
{
    $request->validate([
        'kode' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
    ]);

    $mapels = Mapel::findOrFail($id);

    DB::transaction(function () use ($request, $mapels) {
        // Update data guru
        $mapels->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);
    });

    return redirect()->route('mapel.index')->with('success', 'Data Mata Pelajaran berhasil diperbarui.');
}

public function destroy3($id)
{
    $mapels = Mapel::findOrFail($id);
    $mapels->delete();
    return redirect()->route('student.index')->with('success', 'Data Mata Pelajaran berhasil dihapus.');
}
    // end tampilan untuk mapel
}
