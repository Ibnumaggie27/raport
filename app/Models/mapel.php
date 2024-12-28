<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama'];
    
    public function kelass()
    {
        return $this->belongsToMany(Kelas::class, 'pakets', 'mapel_id', 'kelas_id');
    }
    public function pakets()
    {
        return $this->belongsToMany(Paket::class, 'mapel_paket');
    }
    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'gumaps');
    }
    // App\Models\Mapel.php
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

}
