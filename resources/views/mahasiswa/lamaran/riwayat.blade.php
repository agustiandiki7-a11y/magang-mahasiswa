@extends('layouts.panel')

@section('judul', 'Riwayat Pengajuan')
@section('peran', 'mahasiswa')

@php $riwayat = $riwayat ?? \App\Support\DataDemo::riwayat(); @endphp

@section('konten')
<h1>Riwayat Pengajuan</h1>
<div class="tabel-bungkus tabel-kartu">
    <table class="tabel">
        <thead><tr><th>No</th><th>Lowongan</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody>
            @foreach ($riwayat as $r)
                <tr>
                    <td>{{ $r['no'] }}</td>
                    <td>{{ $r['lowongan'] }}</td>
                    <td>{{ $r['tanggal'] }}</td>
                    <td><span class="badge badge--{{ $r['warna'] }}">{{ $r['status'] }}</span></td>
                    <td><a href="{{ route('lowongan.detail', $r['no']) }}" class="tautan">Lihat</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<p class="sub"><a href="{{ route('lowongan') }}" class="tautan">+ Buat pengajuan baru</a></p>
@endsection
