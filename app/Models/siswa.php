<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nis', 'nama', 'email', 'kelas_id']; // Tambahkan atribut sesuai dengan tabel siswa

    protected static function booted()
    {
        static::created(function ($siswa) {
            User::create([
                'nama' => $siswa->nama,
                'username' => $siswa->nis, // Username diambil dari NIS
                'password' => bcrypt('123456'), // Password default
                'email' => $siswa->email,
                'role' => 'user', // Set role sebagai siswa
            ]);
        });
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
