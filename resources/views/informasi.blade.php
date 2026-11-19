@extends('layouts.publik')

@section('judul', 'Informasi Program Magang')

@section('konten')
<section class="page-hero" style="background-image:url('{{ asset('assets/img/foto/laptop.jpg') }}')">
    <div class="wadah"><h1>Informasi Program Magang</h1></div>
</section>

<section class="bagian">
    <div class="wadah info-grid">
        <nav class="info-nav" aria-label="Isi halaman">
            <a href="#tentang-program">@include('partials.ikon', ['nama' => 'file', 'ukuran' => 14]) Tentang Program</a>
            <a href="#persyaratan">@include('partials.ikon', ['nama' => 'shield', 'ukuran' => 14]) Persyaratan</a>
            <a href="#manfaat">@include('partials.ikon', ['nama' => 'check', 'ukuran' => 14]) Manfaat</a>
            <a href="#jadwal">@include('partials.ikon', ['nama' => 'calendar', 'ukuran' => 14]) Jadwal</a>
            <a href="#faq">@include('partials.ikon', ['nama' => 'mail', 'ukuran' => 14]) FAQ</a>
        </nav>

        <div class="info-isi">
            <article id="tentang-program">
                <h2>Tentang Program</h2>
                <p>Program magang MagangKu menghubungkan mahasiswa dengan perusahaan mitra untuk pengalaman kerja nyata selama 3 sampai 6 bulan. Setiap peserta didampingi mentor dan mendapat penilaian berkala.</p>
                <p>Program ini terbuka untuk mahasiswa aktif dari berbagai jurusan, baik untuk pemenuhan kurikulum maupun pengembangan diri.</p>
                <img class="info-foto" src="{{ asset('assets/img/foto/gedung-informasi.jpg') }}" alt="Gedung kantor mitra">
            </article>

            <article id="persyaratan">
                <h2>Persyaratan</h2>
                <ul class="centang">
                    <li>Mahasiswa aktif minimal semester 5</li>
                    <li>Melampirkan CV dan transkrip nilai terbaru</li>
                    <li>Surat pengantar dari kampus</li>
                </ul>
            </article>

            <article id="manfaat">
                <h2>Manfaat Mengikuti Magang</h2>
                <ul class="centang">
                    <li>Menambah pengalaman kerja</li>
                    <li>Membangun jaringan profesional</li>
                    <li>Meningkatkan kompetensi</li>
                </ul>
            </article>

            <article id="jadwal">
                <h2>Jadwal</h2>
                <div class="tabel-bungkus">
                    <table class="tabel">
                        <thead><tr><th>Tahap</th><th>Periode</th></tr></thead>
                        <tbody>
                            <tr><td>Pendaftaran</td><td>1 – 30 setiap bulan</td></tr>
                            <tr><td>Seleksi berkas &amp; wawancara</td><td>Maksimal 14 hari setelah pendaftaran</td></tr>
                            <tr><td>Pengumuman</td><td>3 hari kerja setelah wawancara</td></tr>
                        </tbody>
                    </table>
                </div>
            </article>

            <article id="faq">
                <h2>FAQ</h2>
                <details class="faq"><summary>Apakah magang ini berbayar?</summary><p>Tergantung kebijakan perusahaan mitra. Informasi tertera pada detail setiap lowongan.</p></details>
                <details class="faq"><summary>Bisakah mendaftar ke lebih dari satu lowongan?</summary><p>Bisa, kamu dapat memantau seluruh pengajuan di halaman Riwayat.</p></details>
                <details class="faq"><summary>Bagaimana jika pengajuan ditolak?</summary><p>Kamu tetap bisa mengajukan ke lowongan lain pada periode yang sama.</p></details>
            </article>
        </div>
    </div>
</section>
@endsection
