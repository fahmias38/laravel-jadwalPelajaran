<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;   // ← WAJIB ADA
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;  // ← untuk relasi

class Guru extends Model
{   
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'mapel',
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
