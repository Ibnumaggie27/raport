<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'pakets';

    protected $fillable = [
        'kelas_id',
        'mapel_id',
    ];

    /**
     * Relasi ke Kelas (Many-to-One).
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    /**
     * Relasi ke Mapel (Many-to-One).
     */
    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'mapel_paket');
    }
}
