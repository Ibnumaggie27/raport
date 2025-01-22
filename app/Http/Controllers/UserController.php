<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\siswa;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index'); // Sesuaikan dengan path view Anda
    }


    public function index1()
    {
        // Ambil user yang sedang login
        $user = auth()->user();
    
        // Ambil siswa dari user
        $siswa = $user->siswa;
    
        if ($siswa && $siswa->kelas) {
            // Ambil kelas siswa
            $kelas = $siswa->kelas;
    
            // Ambil paket yang sesuai dengan kelas siswa
            $mapelPaket = Paket::where('kelas_id', $kelas->id)
                ->with('mapels') // Pastikan memuat relasi mapel
                ->paginate(10);
        } else {
            // Jika siswa atau kelas tidak ditemukan, buat paginator kosong
            $mapelPaket = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
        }
    
        // Kirim data ke view
        return view('user.jadwal.index', compact('mapelPaket', 'siswa'));
    }
    
    public function index2()
    {
        // Ambil data siswa dengan relasi kelas
        $ddiri = Siswa::with('kelas')->where('user_id', auth()->id())->first();
    
        // Pastikan jika data tidak ditemukan
        if (!$ddiri) {
            return redirect()->route('home')->with('error', 'Data diri tidak ditemukan');
        }
    
        return view('user.dDiri.index', compact('ddiri'));
    }
    

}
