<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\gumap;
use App\Models\kelas;
use Illuminate\Support\Facades\DB;
use App\Models\wakel;
use App\Models\paket;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Sesuaikan dengan path view Anda
    }

// #region untuk guru
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
// #endregion tampilan untuk guru

//tampilan untuk siswa
    public function index2()
    {
        $siswas = siswa::paginate(10);
        return view('admin.student.index', compact('siswas'));
    }
    public function create2()
    {
        // Mengambil semua data kelas dari tabel kelas
        $kelass = Kelas::all(); 

        // Mengirimkan data kelas ke view
        return view('admin.student.create', compact('kelass'));
    }
    public function store2(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('student.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit2($id)
    {
        $siswas = siswa::findOrFail($id);
        $kelass = Kelas::all(); // Ambil data kelas untuk dropdown
        return view('admin.student.edit', compact('siswas', 'kelass')); // Kirim data siswa dan kelas ke view
    }
        public function update2(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswas,nis,' . $id,
            'email' => 'nullable|email|max:100',
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        $siswas = siswa::findOrFail($id);

        DB::transaction(function () use ($request, $siswas) {
            $siswas->update([
                'nama' => $request->nama,
                'nis' => $request->nis,
                'email' => $request->email,
                'kelas_id' => $request->kelas_id,
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
//end tampilan untuk siswa

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

// start tampilan untuk guru mapel
    public function index4()
    {
        $gumaps = gumap::paginate(10);
        return view('admin.gumap.index', compact('gumaps'));
    }
    public function create4()
    {
        $mapels = Mapel::all();
        $gurus = Guru::all();
        return view('admin.gumap.create', compact('mapels', 'gurus'));
    }
    public function store4(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
        ]);

        gumap::create($request->all());

        return redirect()->route('gumap.index')->with('success', 'Data Guru Mata Pelajaran berhasil ditambahkan.');
    }
    public function edit4($id)
    {
        $gumaps = gumap::findOrFail($id);
        $mapels = Mapel::all();
        $gurus = Guru::all();
        return view('admin.gumap.edit', compact('gumaps', 'mapels', 'gurus'));
    }
    public function update4(Request $request, $id)
    {
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
        ]);

        $gumaps = gumap::findOrFail($id);

        DB::transaction(function () use ($request, $gumaps) {
            // Update data guru
            $gumaps->update([
                'guru_id' => $request->guru_id,
                'mapel_id' => $request->mapel_id,
            ]);
        });

        return redirect()->route('gumap.index')->with('success', 'Data Guru Mata Pelajaran berhasil diperbarui.');
    }
    public function destroy4($id)
    {
        $gumaps = gumap::findOrFail($id);
        $gumaps->delete();
        return redirect()->route('gumap.index')->with('success', 'Data Guru Mata Pelajaran berhasil dihapus.');
    }
// end tampilan untuk guru mapel

// start tampilan untuk kelas
    public function index5()
    {
        $kelass = kelas::paginate(10);
        return view('admin.kelas.index', compact('kelass'));
    }
    public function create5()
    {
        return view('admin.kelas.create');
    }
    public function store5(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil ditambahkan.');
    }
    public function edit5($id)
    {
        $kelass = kelas::findOrFail($id);
        return view('admin.kelas.edit', compact('kelass'));
    }
    public function update5(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        $kelass = kelas::findOrFail($id);

        DB::transaction(function () use ($request, $kelass) {
            // Update data guru
            $kelass->update([
                'nama_kelas' => $request->nama_kelas,
            ]);
        });

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil diperbarui.');
    }
    public function destroy5($id)
    {
        $kelass = kelas::findOrFail($id);
        $kelass->delete();
        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil dihapus.');
    }
// end tampilan untuk kelas
    
// start tampilan untuk wali kelas
    public function index6()
    {
        $wakels = wakel::paginate(10);
        return view('admin.wakel.index', compact('wakels'));
    }
    public function create6()
    {
        $kelas = kelas::all();
        $gurus = Guru::all();
        return view('admin.wakel.create', compact('kelas', 'gurus'));
    }
    public function store6(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'guru_id' => 'required',
        ]);

        wakel::create($request->all());

        return redirect()->route('walikelas.index')->with('success', 'Data Wali Kelas berhasil ditambahkan.');
    }
    public function edit6($id)
    {
        $wakels = wakel::findOrFail($id);
        $kelass = kelas::all();
        $gurus = Guru::all();
        return view('admin.wakel.edit', compact('wakels','kelass','gurus'));
    }
    public function update6(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required',
            'guru_id' => 'required',
        ]);

        $wakels = wakel::findOrFail($id);

        DB::transaction(function () use ($request, $wakels) {
            // Update data guru
            $wakels->update([
                'kelas_id' => $request->kelas_id,
                'guru_id' => $request->guru_id,
            ]);
        });

        return redirect()->route('walikelas.index')->with('success', 'Data Wali Kelas berhasil diperbarui.');
    }
    public function destroy6($id)
    {
        $wakels = wakel::findOrFail($id);
        $wakels->delete();
        return redirect()->route('walikelas.index')->with('success', 'Data Wali Kelas berhasil dihapus.');
    }
//end tampilan untuk wali kelas

//start tampilan untuk paket
    public function index7()
    {
        $pakets = Paket::with(['kelas'])->paginate(10); // Ambil data paket dengan relasi kelas dan mapel
        return view('admin.paket.index', compact('pakets'));
    }
    public function create7()
    {
        $kelas = Kelas::all(); // Ambil semua kelas
        $mapels = Mapel::all(); // Ambil semua mapel
        return view('admin.paket.create', compact('kelas', 'mapels'));
    }
    public function store7(Request $request)
    {
        $validated = $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mapel_id' => 'required|array|min:1', // Pastikan mapel_id ada dan lebih dari 1
            'mapel_id.*' => 'exists:mapels,id', // Validasi setiap id mapel yang dipilih
        ]);

        // Menyimpan Paket dengan Kelas yang dipilih
        $paket = new Paket();
        $paket->kelas_id = $request->kelas_id;
        $paket->save();

        // Menyimpan relasi antara paket dan mapel menggunakan tabel pivot
        $paket->mapels()->sync($request->mapel_id); // sync akan menghubungkan paket dengan banyak mapel

        return redirect()->route('paket.index')->with('success', 'Paket berhasil disimpan!');
    }
    public function edit7($id)
    {
        $paket = Paket::findOrFail($id); // Ambil data paket berdasarkan ID
        $kelas = Kelas::all();
        $mapels = Mapel::all();
        return view('admin.paket.edit', compact('paket', 'kelas', 'mapels'));
    }

    public function update7(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mapel_id' => 'required|array|min:1',  // Pastikan mapel_id adalah array dan minimal 1 dipilih
            'mapel_id.*' => 'exists:mapels,id',    // Pastikan setiap mapel_id yang dipilih valid
        ]);

        // Ambil paket berdasarkan ID
        $paket = Paket::findOrFail($id);

        // Update data paket lainnya (kelas_id dan lainnya)
        $paket->kelas_id = $request->kelas_id;
        $paket->save();  // Simpan perubahan

        // Sync mapel yang dipilih (menghapus yang tidak terpilih dan menambahkan yang baru)
        $paket->mapels()->sync($request->mapel_id);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui!');
    }
    public function destroy7($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus!');
    }
//end tampilan paket
}
