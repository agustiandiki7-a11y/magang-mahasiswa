<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LowonganMagang extends Model
{
    // Menggunakan fitur Factory
    use HasFactory;

    // Nama tabel database
    protected $table = 'lowongan_magang';

    // Kolom yang boleh diisi
    protected $fillable = [
        'admin_id',
        'nama_posisi',
        'divisi',
        'kuota',
        'periode_mulai',
        'periode_selesai',
        'persyaratan',
        'status',
    ];

    // Relasi ke Admin HRD
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // Relasi ke banyak lamaran
    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'lowongan_id');
    }
}
