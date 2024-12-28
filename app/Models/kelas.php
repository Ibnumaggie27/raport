<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kelas'];

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'pakets', 'kelas_id', 'mapel_id');
    }
    public function pakets()
    {
        return $this->hasMany(Paket::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    
}
