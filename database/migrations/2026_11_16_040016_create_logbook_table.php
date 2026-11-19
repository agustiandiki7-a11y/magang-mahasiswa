<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Membuat tabel logbook untuk aktivitas harian mahasiswa
        Schema::create('logbook', function (Blueprint $table) {
            $table->id();

            // Relasi ke data lamaran magang
            $table->foreignId('lamaran_id')
                ->constrained('lamaran')
                ->onDelete('cascade');

            // Tanggal mahasiswa melakukan kegiatan magang
            $table->date('tanggal');

            // Aktivitas yang dilakukan mahasiswa
            $table->text('kegiatan');

            // Hasil dari kegiatan yang dilakukan
            $table->text('hasil');

            // Status validasi logbook oleh mentor
            $table->enum('status_validasi', [
                'Menunggu',
                'Disetujui',
                'Ditolak'
            ])->default('Menunggu');

            // Catatan atau masukan dari mentor
            $table->text('catatan_mentor')->nullable();

            // Waktu data dibuat dan diperbarui
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Menghapus tabel logbook ketika rollback
        Schema::dropIfExists('logbook');
    }
};
