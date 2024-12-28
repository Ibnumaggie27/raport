<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    // Tentukan tabel terkait
    protected $table = 'nilais';

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = ['guru_id', 'mapel_id', 'kelas_id', 'siswa_id', 'nilai', 'evaluasi1', 'evaluasi2'];

    // Relasi ke model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    // Relasi ke model Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    // Relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
