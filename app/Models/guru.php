<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama', 'email', 'alamat', 'user_id']; // Pastikan 'user_id' ada di $fillable jika ada dalam tabel

    protected static function booted()
    {
        static::created(function ($guru) {
            $user = User::create([
                'nama' => $guru->nama,
                'username' => $guru->nip, // Username diambil dari NIP
                'password' => bcrypt('123456'), // Password default
                'email' => $guru->email,
                'role' => 'guru', // Set role sebagai guru
            ]);

            // Hubungkan user yang dibuat dengan guru
            $guru->user_id = $user->id;
            $guru->save();
        });
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Mapel
    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'gumaps');
    }
    // App\Models\Guru.php
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    public function pakets()
{
    return $this->hasManyThrough(Paket::class, Gumap::class, 'guru_id', 'mapel_id', 'id', 'mapel_id');
}

}
