<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Membuat tabel users untuk semua akun pengguna
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Data identitas pengguna
            $table->string('nama', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);

            // Hak akses pengguna
            // admin = HRD, mentor = pembimbing, mahasiswa = peserta magang
            $table->enum('role', [
                'admin',
                'mentor',
                'mahasiswa'
            ]);

            // Data pribadi pengguna
            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan'
            ])->nullable();

            $table->string('no_hp', 15)->nullable();
            $table->text('alamat')->nullable();

            // Data akademik mahasiswa
            // Kolom dibuat nullable karena admin dan mentor tidak memiliki data ini
            $table->string('nim', 30)->nullable()->unique();
            $table->string('kampus', 150)->nullable();
            $table->string('jurusan', 150)->nullable();

            // Token untuk fitur remember me
            $table->rememberToken();

            // Waktu data dibuat dan diperbarui
            $table->timestamps();
        });

        // Tabel untuk menyimpan token reset password
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 255)->primary();
            $table->string('token', 255);
            $table->timestamp('created_at')->nullable();
        });

        // Tabel untuk menyimpan sesi login pengguna
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        // Menghapus tabel ketika migration di-rollback
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
