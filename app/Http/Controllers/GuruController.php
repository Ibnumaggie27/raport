<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Gumap;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index'); // Sesuaikan dengan path view Anda
    }

//start route nilai
    public function index1()
    {
        $gurus = Guru::with('mapels')
            ->where('user_id', Auth::id())
            ->paginate(10);

        return view('guru.nilai.index', compact('gurus'));
    }
    public function create1($mapel_id)
    {
        // Ambil data guru yang sedang login
        $guru = Guru::where('user_id', Auth::id())->first();

        if (!$guru) {
            return redirect()->back()->with('error', 'Guru tidak ditemukan.');
        }

        // Ambil gumap (guru mapel) terkait guru yang sedang login
        $gumap = Gumap::where('guru_id', $guru->id)->where('mapel_id', $mapel_id)->with('mapel')->first();

        if (!$gumap) {
            return redirect()->back()->with('error', 'Data mata pelajaran tidak ditemukan.');
        }

        // Ambil paket yang terkait dengan mapel dan guru
        $paket = Paket::whereHas('mapels', function ($query) use ($mapel_id) {
            $query->where('mapels.id', $mapel_id);
        })->with('kelas')->first();

        if (!$paket) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan.');
        }

        // Ambil kelas terkait dengan paket
        $kelas = $paket->kelas;

        if (!$kelas) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan.');
        }

        // Ambil semua siswa yang terhubung dengan kelas
        $siswas = Siswa::where('kelas_id', $kelas->id)->get();

        return view('guru.nilai.create', compact('guru', 'gumap', 'paket', 'kelas', 'siswas'));
    }
 public function store1(Request $request)
    {
        $request->validate([
            'siswa.*.siswa_id' => 'required|exists:siswas,id',
            'siswa.*.nilai' => 'nullable|integer',
            'siswa.*.evaluasi1' => 'nullable|string',
            'siswa.*.evaluasi2' => 'nullable|string',
        ]);

        foreach ($request->siswa as $siswaData) {
            Nilai::create([
                'guru_id' => $request->guru_id,
                'mapel_id' => $request->mapel_id,
                'kelas_id' => $request->kelas_id,
                'siswa_id' => $siswaData['siswa_id'],
                'nilai' => $siswaData['nilai'],
                'evaluasi1' => $siswaData['evaluasi1'],
                'evaluasi2' => $siswaData['evaluasi2'],
            ]);
        }

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil disimpan!');
    }

//end route nilai

//start route wakel
public function index2()
{
    // Fetch the guru data with their associated wakels and the related kelas
    $gurus = Guru::with('wakels.kelas') // Eager load the 'kelas' relationship through 'wakels'
        ->where('user_id', Auth::id()) // Filter by the logged-in user's ID
        ->paginate(10); // Paginate the results for the teacher

    return view('guru.wakel.index', compact('gurus')); // Pass the data to the view
}

    //end route wakel
}
