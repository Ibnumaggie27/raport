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
}
