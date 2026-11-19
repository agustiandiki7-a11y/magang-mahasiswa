@extends('layouts.publik')

@section('judul', $item['judul'])

@section('konten')
<section class="page-hero page-hero--detail" style="background-image:url('{{ asset('assets/img/foto/gedung-detail.jpg') }}')"></section>

<section class="bagian">
    <div class="wadah detail">
        <a href="{{ route('lowongan') }}" class="kembali">← Semua lowongan</a>
        <div class="detail__kepala">
            <div>
                <h1>{{ $item['judul'] }}</h1>
                <p class="perusahaan">{{ $item['perusahaan'] }}</p>
                <div class="chip-baris">
                    <span class="chip chip--biru">{{ $item['jenis'] }}</span>
                    <span class="chip">@include('partials.ikon', ['nama' => 'map', 'ukuran' => 12]) {{ $item['lokasi'] }}</span>
                    <span class="chip">@include('partials.ikon', ['nama' => 'clock', 'ukuran' => 12]) {{ $item['durasi'] }}</span>
                </div>
            </div>
            <a href="{{ route('mahasiswa.lamaran.create', $item['id']) }}" class="btn btn-primary">Ajukan Sekarang @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 16])</a>
        </div>

        <h2>Deskripsi Pekerjaan</h2>
        <p>{{ $item['deskripsi'] }}</p>
        <ul class="titik-daftar">
            @foreach ($item['tugas'] as $t)<li>{{ $t }}</li>@endforeach
        </ul>

        <h2>Kualifikasi</h2>
        <ul class="centang">
            @foreach ($item['kualifikasi'] as $k)<li>{{ $k }}</li>@endforeach
        </ul>
    </div>
</section>
@endsection
