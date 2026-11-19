<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    // Menggunakan fitur Factory
    use HasFactory;

    // Nama tabel database
    protected $table = 'penilaian';

    // Kolom yang boleh diisi
    protected $fillable = [
        'lamaran_id',
        'nilai',
        'evaluasi',
    ];

    // Relasi ke lamaran
    public function lamaran()
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }
}
