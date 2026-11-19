@extends('layouts.publik')

@section('judul', 'Lowongan Magang')

@section('konten')
<section class="page-hero" style="background-image:url('{{ asset('assets/img/foto/gedung-detail.jpg') }}')">
    <div class="wadah"><h1>Lowongan Magang</h1></div>
</section>

<section class="bagian">
    <div class="wadah">
        <form class="cari" id="formCari" onsubmit="return false;">
            <span class="cari__ikon">@include('partials.ikon', ['nama' => 'search', 'ukuran' => 16])</span>
            <input type="search" id="kataKunci" placeholder="Cari lowongan..." aria-label="Cari lowongan">
            <button type="button" class="btn btn-primary btn-sm" id="tombolFilter">Filter</button>
        </form>

        <div class="lowongan-grid">
            <aside class="filter" aria-label="Filter lowongan">
                <label>Kategori
                    <select id="fKategori"><option value="">Semua Kategori</option>
                        @foreach (collect($daftar)->pluck('kategori')->unique() as $k)<option>{{ $k }}</option>@endforeach
                    </select>
                </label>
                <label>Lokasi
                    <select id="fLokasi"><option value="">Semua Lokasi</option>
                        @foreach (collect($daftar)->pluck('lokasi')->unique() as $k)<option>{{ $k }}</option>@endforeach
                    </select>
                </label>
                <label>Jenis Magang
                    <select id="fJenis"><option value="">Semua Jenis</option>
                        @foreach (collect($daftar)->pluck('jenis')->unique() as $k)<option>{{ $k }}</option>@endforeach
                    </select>
                </label>
            </aside>

            <div class="daftar" id="daftarLowongan">
                @foreach ($daftar as $l)
                    <a class="kartu-lowongan" href="{{ route('lowongan.detail', $l['id']) }}"
                       data-judul="{{ strtolower($l['judul'] . ' ' . $l['perusahaan']) }}"
                       data-kategori="{{ $l['kategori'] }}" data-lokasi="{{ $l['lokasi'] }}" data-jenis="{{ $l['jenis'] }}">
                        <span class="ikon-kotak ikon-kotak--{{ $l['warna'] }}">@include('partials.ikon', ['nama' => $l['ikon'], 'ukuran' => 20])</span>
                        <span class="kartu-lowongan__isi">
                            <strong>{{ $l['judul'] }}</strong>
                            <small>{{ $l['perusahaan'] }}</small>
                            <span class="meta">
                                <em>@include('partials.ikon', ['nama' => 'map', 'ukuran' => 12]) {{ $l['lokasi'] }}</em>
                                <em>@include('partials.ikon', ['nama' => 'clock', 'ukuran' => 12]) {{ $l['durasi'] }}</em>
                            </span>
                        </span>
                        @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 16])
                    </a>
                @endforeach
                <p class="kosong" id="kosong" hidden>Tidak ada lowongan yang cocok dengan pencarianmu.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="{{ asset('assets/js/lowongan.js') }}"></script>
@endpush
