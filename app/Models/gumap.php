<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gumap extends Model
{
    use HasFactory;

    protected $fillable = ['mapel_id', 'guru_id'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function paket()
{
    return $this->hasOneThrough(Paket::class, Mapel::class, 'id', 'mapel_id', 'mapel_id', 'id');
}

}

