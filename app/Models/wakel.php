<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wakel extends Model
{
    use HasFactory;
    protected $fillable = ['kelas_id', 'guru_id'];

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}

