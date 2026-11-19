<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logbook extends Model
{
    // Menggunakan fitur Factory
    use HasFactory;

    // Nama tabel database
    protected $table = 'logbook';

    // Kolom yang boleh diisi
    protected $fillable = [
        'lamaran_id',
        'tanggal',
        'kegiatan',
        'hasil',
        'status_validasi',
        'catatan_mentor',
    ];

    // Relasi ke lamaran
    public function lamaran()
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }
}
