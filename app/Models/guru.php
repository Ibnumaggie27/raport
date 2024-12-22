<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama', 'email', 'alamat']; // Tambahkan atribut sesuai dengan tabel guru

    protected static function booted()
    {
        static::created(function ($guru) {
            User::create([
                'nama' => $guru->nama,
                'username' => $guru->nip, // Username diambil dari NIP
                'password' => bcrypt('123456'), // Password default
                'email' => $guru->email,
                'role' => 'guru', // Set role sebagai guru
            ]);
        });
    }
}
