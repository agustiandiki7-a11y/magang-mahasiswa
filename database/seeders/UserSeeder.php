<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@magangku.test'],
            [
                'nama' => 'Admin MagangKu',
                'password' => 'AdminMagangKu123!',
                'role' => 'admin',
            ]
        );

        // Akun Mentor
        User::updateOrCreate(
            ['email' => 'mentor@magangku.test'],
            [
                'nama' => 'Mentor MagangKu',
                'password' => 'MentorMagangKu123!',
                'role' => 'mentor',
            ]
        );

        // Akun Mahasiswa
        User::updateOrCreate(
            ['email' => 'mahasiswa@magangku.test'],
            [
                'nama' => 'Mahasiswa MagangKu',
                'password' => 'MahasiswaMagangKu123!',
                'role' => 'mahasiswa',
            ]
        );
    }
}
