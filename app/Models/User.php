<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Menggunakan fitur Factory dan Notifikasi
    use HasFactory, Notifiable;

    // Nama tabel database
    protected $table = 'users';

    // Kolom yang boleh diisi melalui mass assignment
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'nim',
        'kampus',
        'jurusan',
    ];

    // Kolom yang tidak ditampilkan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Mengatur tipe data atribut
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
