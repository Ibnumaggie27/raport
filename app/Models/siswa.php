<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nis', 'nama', 'email', 'kelas_id', 'user_id']; // Tambahkan atribut sesuai dengan tabel siswa

    protected static function booted()
{
    static::created(function ($siswa) {
        // Buat User baru
        $user = User::create([
            'nama' => $siswa->nama,
            'username' => $siswa->nis, // Username diambil dari NIS
            'password' => bcrypt('123456'), // Password default
            'email' => $siswa->email,
            'role' => 'user', // Set role sebagai siswa
        ]);

        // Set user_id ke siswa
        $siswa->user_id = $user->id;
        $siswa->save();
    });
}

    public function user()
    {
        return $this->belongsTo(User::class);
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
