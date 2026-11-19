@extends('layouts.publik')

@section('judul', 'Beranda')

@php $mitra = $mitra ?? \App\Support\DataDemo::mitra(); @endphp

@section('konten')
{{-- ===== HERO ===== --}}
<section class="hero">
    <div class="hero__foto" style="background-image:url('{{ asset('assets/img/foto/hero-gedung.jpg') }}')"></div>
    <div class="wadah hero__isi">
        <span class="lencana"><i class="titik"></i> Portal Magang Mahasiswa</span>
        <h1>Langkah Awal<br>Menuju <span class="biru">Karier Profesional</span></h1>
        <p>Temukan kesempatan magang terbaik, kembangkan potensi diri, dan bangun masa depan yang lebih cerah bersama kami.</p>
        <div class="hero__aksi">
            <a href="{{ route('lowongan') }}" class="btn btn-primary">Jelajahi Lowongan @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 16])</a>
            <a href="{{ route('informasi') }}" class="btn btn-outline">@include('partials.ikon', ['nama' => 'play', 'ukuran' => 16]) Pelajari Lebih Lanjut</a>
        </div>
        <div class="hero__bukti">
            <div class="avatar-grup" aria-hidden="true"><i style="--c:#c98f6b"></i><i style="--c:#8c6a4f"></i><i style="--c:#d8a98a"></i><i style="--c:#6f5a48"></i></div>
            <small>Dipercaya oleh ribuan mahasiswa<br>untuk memulai karier mereka</small>
        </div>
    </div>
</section>

{{-- ===== TENTANG PROGRAM ===== --}}
<section class="bagian" id="program">
    <div class="wadah dua-kolom">
        <div>
            <span class="eyebrow">Tentang Program</span>
            <h2 class="judul-besar">Program Magang<br>untuk Mahasiswa</h2>
            <p>Program magang ini dirancang untuk memberikan pengalaman kerja nyata, memperluas jaringan, dan meningkatkan kompetensi di dunia profesional.</p>
            <a href="{{ route('informasi') }}" class="btn btn-primary">Selengkapnya @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 16])</a>
        </div>
        <figure class="foto-kartu"><img src="{{ asset('assets/img/foto/laptop.jpg') }}" alt="Laptop di meja kerja dengan pemandangan gedung kantor"></figure>
    </div>
</section>

{{-- ===== ALUR PENGAJUAN ===== --}}
<section class="bagian bagian--tengah" id="alur">
    <div class="wadah">
        <span class="eyebrow eyebrow--tengah">Alur Pengajuan</span>
        <h2 class="judul-tengah">Mudah, Cepat, dan Transparan</h2>
        <ol class="alur">
            @foreach ([
                ['user', 'Lengkapi Profil', 'Isi data diri dan informasi pendidikan.'],
                ['briefcase', 'Pilih Lowongan', 'Jelajahi dan pilih posisi magang yang sesuai.'],
                ['cloud', 'Unggah Dokumen', 'Kirim berkas yang dibutuhkan.'],
                ['check', 'Pantau Status', 'Lihat perkembangan pengajuanmu.'],
            ] as $i => [$ikon, $judul, $teks])
                <li>
                    <span class="alur__ikon">@include('partials.ikon', ['nama' => $ikon, 'ukuran' => 20])</span>
                    <h3>{{ $i + 1 }}. {{ $judul }}</h3>
                    <p>{{ $teks }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- ===== MITRA ===== --}}
<section class="bagian bagian--kecil">
    <div class="wadah">
        <div class="mitra">
            <div class="mitra__teks">
                <h2>Kesempatan Magang dari Berbagai Perusahaan Terbaik</h2>
                <p>Kami bekerja sama dengan ratusan perusahaan ternama dari berbagai sektor industri untuk memberimu pengalaman magang yang berkualitas.</p>
                <a href="{{ route('lowongan') }}" class="btn btn-primary btn-sm">Lihat Semua Lowongan @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 14])</a>
            </div>
            <div class="mitra__logo">
                @foreach ($mitra as $nama)
                    <div class="mitra-ubin mitra-ubin--{{ \Illuminate\Support\Str::slug($nama) }}"><span>{{ $nama }}</span></div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
