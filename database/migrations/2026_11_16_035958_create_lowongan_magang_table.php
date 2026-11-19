<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Membuat tabel lowongan magang
        Schema::create('lowongan_magang', function (Blueprint $table) {
            $table->id();

            // Relasi ke akun Admin HRD
            $table->foreignId('admin_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Informasi posisi dan divisi magang
            $table->string('nama_posisi', 150);
            $table->string('divisi', 100);

            // Jumlah mahasiswa yang dibutuhkan
            $table->unsignedInteger('kuota');

            // Periode pelaksanaan magang
            $table->date('periode_mulai');
            $table->date('periode_selesai');

            // Persyaratan untuk melamar posisi magang
            $table->text('persyaratan');

            // Status ketersediaan lowongan
            $table->enum('status', [
                'Dibuka',
                'Ditutup'
            ])->default('Dibuka');

            // Waktu data dibuat dan diperbarui
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Menghapus tabel lowongan magang ketika rollback
        Schema::dropIfExists('lowongan_magang');
    }
};
