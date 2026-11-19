<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lamaran extends Model
{
    // Menggunakan fitur Factory
    use HasFactory;

    // Nama tabel database
    protected $table = 'lamaran';

    // Kolom yang boleh diisi
    protected $fillable = [
        'mahasiswa_id',
        'lowongan_id',
        'mentor_id',
        'cv',
        'surat_pengantar',
        'status',
        'catatan',
    ];

    // Relasi ke mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    // Relasi ke lowongan magang
    public function lowongan()
    {
        return $this->belongsTo(LowonganMagang::class, 'lowongan_id');
    }

    // Relasi ke mentor
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    // Relasi ke banyak logbook
    public function logbook()
    {
        return $this->hasMany(Logbook::class, 'lamaran_id');
    }

    // Relasi ke penilaian
    public function penilaian()
    {
        return $this->hasOne(Penilaian::class, 'lamaran_id');
    }
}
