<?php

namespace App\Support;

/**
 * Data contoh untuk tampilan. Ganti dengan Model/Eloquent saat backend siap.
 */
class DataDemo
{
    public static function lowongan(): array
    {
        return [
            1 => [
                'id' => 1, 'judul' => 'Frontend Developer Intern', 'perusahaan' => 'PT. Nusantara Digital',
                'lokasi' => 'Yogyakarta', 'durasi' => '3 bulan', 'jenis' => 'Full-time', 'kategori' => 'Teknologi',
                'ikon' => 'code', 'warna' => 'biru',
                'deskripsi' => 'Bergabung dengan tim produk untuk membangun antarmuka web yang responsif dan mudah digunakan. Kamu akan dibimbing langsung oleh mentor berpengalaman dan terlibat pada proyek nyata.',
                'tugas' => ['Mengembangkan halaman web dengan HTML, CSS, dan JavaScript', 'Berkolaborasi dengan desainer dan backend developer', 'Menulis kode yang rapi dan mudah dipelihara', 'Mengikuti sesi review kode mingguan'],
                'kualifikasi' => ['Mahasiswa aktif semester 5 ke atas', 'Menguasai dasar HTML, CSS, dan JavaScript', 'Mampu bekerja dalam tim', 'Bersedia magang selama 3 bulan'],
            ],
            2 => [
                'id' => 2, 'judul' => 'UI/UX Design Intern', 'perusahaan' => 'PT. Kreatika Solusi',
                'lokasi' => 'Yogyakarta', 'durasi' => '3 bulan', 'jenis' => 'Full-time', 'kategori' => 'Desain',
                'ikon' => 'pen', 'warna' => 'hijau',
                'deskripsi' => 'Membantu tim desain merancang pengalaman pengguna untuk aplikasi mobile dan web, mulai dari riset hingga prototipe.',
                'tugas' => ['Membuat wireframe dan prototipe interaktif', 'Melakukan riset pengguna sederhana', 'Menyusun design system bersama tim', 'Mempresentasikan hasil desain'],
                'kualifikasi' => ['Mahasiswa aktif jurusan terkait desain atau informatika', 'Familiar dengan Figma', 'Memiliki portofolio desain', 'Komunikatif dan terbuka pada masukan'],
            ],
            3 => [
                'id' => 3, 'judul' => 'Business Analyst Intern', 'perusahaan' => 'PT. Maju Bersama',
                'lokasi' => 'Bandung', 'durasi' => '3 bulan', 'jenis' => 'Hybrid', 'kategori' => 'Bisnis',
                'ikon' => 'chart', 'warna' => 'abu',
                'deskripsi' => 'Mendukung tim bisnis dalam menganalisis kebutuhan proses dan menyusun dokumentasi yang jelas untuk pengembangan produk.',
                'tugas' => ['Mengumpulkan dan menganalisis kebutuhan bisnis', 'Menyusun dokumen proses dan laporan', 'Membantu koordinasi antar tim', 'Menyajikan temuan dalam bentuk visual'],
                'kualifikasi' => ['Mahasiswa aktif semester 5 ke atas', 'Mampu menggunakan spreadsheet dengan baik', 'Teliti dan analitis', 'Kemampuan komunikasi yang baik'],
            ],
            4 => [
                'id' => 4, 'judul' => 'Data Analyst Intern', 'perusahaan' => 'PT. Data Cakrawala',
                'lokasi' => 'Jakarta', 'durasi' => '4 bulan', 'jenis' => 'Hybrid', 'kategori' => 'Teknologi',
                'ikon' => 'chart', 'warna' => 'biru',
                'deskripsi' => 'Mengolah data operasional menjadi dashboard dan laporan yang membantu pengambilan keputusan.',
                'tugas' => ['Membersihkan dan mengolah data', 'Membuat dashboard sederhana', 'Menyusun laporan berkala', 'Berdiskusi dengan tim produk'],
                'kualifikasi' => ['Mahasiswa aktif jurusan statistik atau informatika', 'Mengenal SQL atau Python', 'Teliti dan terstruktur', 'Bersedia magang 4 bulan'],
            ],
            5 => [
                'id' => 5, 'judul' => 'Digital Marketing Intern', 'perusahaan' => 'PT. Pasar Kita',
                'lokasi' => 'Remote', 'durasi' => '3 bulan', 'jenis' => 'Remote', 'kategori' => 'Pemasaran',
                'ikon' => 'megaphone', 'warna' => 'hijau',
                'deskripsi' => 'Membantu tim pemasaran merencanakan konten dan kampanye digital di berbagai kanal.',
                'tugas' => ['Menyusun kalender konten', 'Membuat materi kampanye media sosial', 'Memantau performa kampanye', 'Menyajikan laporan mingguan'],
                'kualifikasi' => ['Mahasiswa aktif semua jurusan', 'Menguasai media sosial', 'Kreatif dan komunikatif', 'Memiliki koneksi internet stabil'],
            ],
        ];
    }

    public static function riwayat(): array
    {
        return [
            ['no' => 1, 'lowongan' => 'Frontend Developer Intern', 'tanggal' => '12 Mei 2025', 'status' => 'Diterima', 'warna' => 'hijau'],
            ['no' => 2, 'lowongan' => 'UI/UX Design Intern', 'tanggal' => '5 Apr 2025', 'status' => 'Diproses', 'warna' => 'kuning'],
            ['no' => 3, 'lowongan' => 'Business Analyst Intern', 'tanggal' => '20 Mar 2025', 'status' => 'Ditolak', 'warna' => 'merah'],
        ];
    }

    public static function notifikasi(): array
    {
        return [
            ['judul' => 'Pengajuan magang Anda telah diterima', 'waktu' => 'Hari ini, 09:12', 'label' => 'Diterima', 'warna' => 'hijau'],
            ['judul' => 'Jadwal wawancara pada 20 Mei 2025', 'waktu' => 'Kemarin, 15:40', 'label' => 'Info', 'warna' => 'biru'],
            ['judul' => 'Lowongan baru tersedia untuk Anda', 'waktu' => '2 hari lalu', 'label' => 'Baru', 'warna' => 'kuning'],
        ];
    }

    public static function mitra(): array
    {
        return ['Google', 'tokopedia', 'Telkom Indonesia', 'Shopee', 'BCA', 'mandiri'];
    }
}
