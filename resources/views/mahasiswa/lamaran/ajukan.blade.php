@extends('layouts.panel')

@section('judul', 'Pengajuan Magang')
@section('peran', 'mahasiswa')

@php
    // Dari LamaranController@create: kirim $lowongan (satu model) -> dikunci. Tanpa itu: pakai daftar demo.
    $lowongan = $lowongan ?? \App\Support\DataDemo::lowongan();
    $pilihan = is_array($lowongan) ? $lowongan : null;
    $judulLowongan = $pilihan ? '' : ($lowongan->judul ?? $lowongan->judul_lowongan ?? $lowongan->posisi ?? ('Lowongan #' . $lowongan->id));
@endphp

@section('konten')
<nav class="remah" aria-label="Breadcrumb"><a href="{{ route('mahasiswa.dashboard') }}">Dashboard</a> › Pengajuan</nav>
<h1>Pengajuan Magang</h1>

<ol class="stepper" id="stepper">
    @foreach (['Data Diri', 'Informasi Magang', 'Dokumen', 'Konfirmasi'] as $i => $s)
        <li class="{{ $i === 0 ? 'aktif' : '' }}" data-langkah="{{ $i + 1 }}"><span>{{ $i + 1 }}</span><em>{{ $s }}</em></li>
    @endforeach
</ol>

<form method="POST" action="{{ route('mahasiswa.lamaran.store') }}" class="kartu-form" id="formAjukan" enctype="multipart/form-data">
    @csrf

    <section class="langkah" data-langkah="1">
        <h2>Data Diri</h2>
        <div class="grid-form">
            <label class="lebar"><span>Nama Lengkap <b>*</b></span><input type="text" name="nama" value="{{ old('nama', auth()->user()->name ?? 'Diki Pratama') }}" required></label>
            <label class="lebar"><span>NIM <b>*</b></span><input type="text" name="nim" value="{{ old('nim', auth()->user()->nim ?? '12345678') }}" required></label>
            <label>Program Studi<input type="text" name="prodi" placeholder="Teknik Informatika"></label>
            <label>Email<input type="email" name="email" placeholder="diki@mail.com"></label>
        </div>
    </section>

    <section class="langkah" data-langkah="2" hidden>
        <h2>Informasi Magang</h2>
        <div class="grid-form">
            @if ($pilihan)
            <label class="lebar"><span>Lowongan <b>*</b></span>
                <select name="lowongan_id" required>
                    <option value="">Pilih lowongan</option>
                    @foreach ($pilihan as $l)
                        <option value="{{ $l['id'] }}" @selected((int) request('lowongan') === $l['id'])>{{ $l['judul'] }} — {{ $l['perusahaan'] }}</option>
                    @endforeach
                </select>
            </label>
            @else
            <label class="lebar"><span>Lowongan</span>
                <input type="text" value="{{ $judulLowongan }}" readonly>
                <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}" data-judul="{{ $judulLowongan }}">
            </label>
            @endif
            <label>Tanggal Mulai<input type="date" name="mulai"></label>
            <label>Durasi
                <select name="durasi"><option>3 bulan</option><option>4 bulan</option><option>6 bulan</option></select>
            </label>
            <label class="lebar">Motivasi<textarea name="motivasi" rows="4" placeholder="Ceritakan alasanmu mengikuti magang ini"></textarea></label>
        </div>
    </section>

    <section class="langkah" data-langkah="3" hidden>
        <h2>Dokumen</h2>
        <div class="grid-form">
            <label class="lebar">CV (PDF)<input type="file" name="cv" accept=".pdf"></label>
            <label class="lebar">Transkrip Nilai (PDF)<input type="file" name="transkrip" accept=".pdf"></label>
            <label class="lebar">Surat Pengantar Kampus (PDF)<input type="file" name="surat" accept=".pdf"></label>
        </div>
    </section>

    <section class="langkah" data-langkah="4" hidden>
        <h2>Konfirmasi</h2>
        <p class="sub">Periksa kembali data sebelum mengirim.</p>
        <dl class="ringkasan" id="ringkasan"></dl>
    </section>

    <div class="aksi-form">
        <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-outline btn-sm" id="tombolBatal">Batal</a>
        <button type="button" class="btn btn-outline btn-sm" id="tombolKembali" hidden>Kembali</button>
        <button type="button" class="btn btn-primary btn-sm" id="tombolLanjut">Selanjutnya @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 14])</button>
        <button type="submit" class="btn btn-primary btn-sm" id="tombolKirim" hidden>Kirim Pengajuan</button>
    </div>
</form>
@endsection

@push('js')
<script src="{{ asset('assets/js/ajukan.js') }}"></script>
@endpush
