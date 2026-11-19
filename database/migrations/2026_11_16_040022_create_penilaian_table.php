<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Membuat tabel penilaian akhir mahasiswa
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();

            // Relasi ke data lamaran magang
            // Unique memastikan satu lamaran hanya memiliki satu penilaian
            $table->foreignId('lamaran_id')
                ->unique()
                ->constrained('lamaran')
                ->onDelete('cascade');

            // Nilai akhir mahasiswa dengan dua angka di belakang koma
            $table->decimal('nilai', 5, 2);

            // Evaluasi atau penilaian tertulis dari mentor
            $table->text('evaluasi');

            // Waktu data dibuat dan diperbarui
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Menghapus tabel penilaian ketika rollback
        Schema::dropIfExists('penilaian');
    }
};
