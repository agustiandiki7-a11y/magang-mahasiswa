<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();

            // Relasi ke mahasiswa
            $table->foreignId('mahasiswa_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Relasi ke lowongan magang
            $table->foreignId('lowongan_id')
                ->constrained('lowongan_magang')
                ->onDelete('cascade');

            // Relasi ke mentor
            $table->foreignId('mentor_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            // Dokumen persyaratan
            $table->string('cv', 255);
            $table->string('surat_pengantar', 255);

            // Status lamaran
            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Ditolak'
            ])->default('Menunggu');

            // Catatan dari admin
            $table->text('catatan')->nullable();

            // Mencegah lamaran ganda
            $table->unique(['mahasiswa_id', 'lowongan_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
