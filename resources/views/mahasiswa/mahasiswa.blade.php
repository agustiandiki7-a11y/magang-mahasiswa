@extends('layouts.panel')

@section('judul', 'Dashboard Mahasiswa')
@section('peran', 'mahasiswa')

@php
    $notifikasi = $notifikasi ?? \App\Support\DataDemo::notifikasi();
    $namaDepan = explode(' ', auth()->user()->name ?? 'Diki')[0];
@endphp

@section('konten')
<div class="topbar">
    <div>
        <h1>Halo, {{ $namaDepan }} 👋</h1>
        <p class="sub">Selamat datang kembali!</p>
    </div>
    <div class="topbar__aksi">
        <button type="button" class="ikon-tombol ikon-tombol--notif" aria-label="Notifikasi">@include('partials.ikon', ['nama' => 'bell', 'ukuran' => 20])<i class="titik-merah"></i></button>
        <a href="{{ route('mahasiswa.profil') }}" class="avatar" aria-label="Profil">DP</a>
    </div>
</div>

<div class="dash-atas">
    <div class="kartu-gelap">
        <small>Pengajuan Aktif</small>
        <strong>1</strong>
        <a href="{{ route('mahasiswa.lamaran.riwayat') }}">Lihat Detail @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 14])</a>
    </div>
    @include('partials.ilustrasi')
</div>

<h2 class="judul-seksi">Notifikasi Terbaru</h2>
<ul class="notif">
    @foreach ($notifikasi as $n)
        <li>
            <span class="ikon-kotak ikon-kotak--biru ikon-kotak--kecil">@include('partials.ikon', ['nama' => 'file', 'ukuran' => 14])</span>
            <div><strong>{{ $n['judul'] }}</strong><small>{{ $n['waktu'] }}</small></div>
            <span class="badge badge--{{ $n['warna'] }}">{{ $n['label'] }}</span>
        </li>
    @endforeach
</ul>
@endsection
