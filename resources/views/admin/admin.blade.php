@extends('layouts.panel')

@section('judul', 'Dashboard Admin')
@section('peran', 'admin')

@section('konten')
<div class="topbar">
    <div><h1>Dashboard Admin</h1><p class="sub">Ringkasan program magang hari ini.</p></div>
    <div class="topbar__aksi"><span class="avatar">AD</span></div>
</div>

<div class="stat-grid">
    @foreach ([['Total Mahasiswa', '1.248', 'users'], ['Lowongan Aktif', '86', 'briefcase'], ['Pengajuan Baru', '34', 'file'], ['Magang Berjalan', '212', 'chart']] as [$l, $n, $i])
        <div class="stat"><span class="ikon-kotak ikon-kotak--biru">@include('partials.ikon', ['nama' => $i, 'ukuran' => 18])</span><div><small>{{ $l }}</small><strong>{{ $n }}</strong></div></div>
    @endforeach
</div>

<h2 class="judul-seksi">Pengajuan Terbaru</h2>
<div class="tabel-bungkus tabel-kartu">
    <table class="tabel">
        <thead><tr><th>Mahasiswa</th><th>Lowongan</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody>
            @foreach ([
                ['Diki Pratama', 'Frontend Developer Intern', '12 Mei 2025', 'Diterima', 'hijau'],
                ['Sinta Maharani', 'UI/UX Design Intern', '11 Mei 2025', 'Diproses', 'kuning'],
                ['Rizky Ananda', 'Business Analyst Intern', '10 Mei 2025', 'Diproses', 'kuning'],
                ['Maya Lestari', 'Data Analyst Intern', '9 Mei 2025', 'Ditolak', 'merah'],
            ] as [$m, $l, $t, $s, $w])
                <tr>
                    <td>{{ $m }}</td><td>{{ $l }}</td><td>{{ $t }}</td>
                    <td><span class="badge badge--{{ $w }}">{{ $s }}</span></td>
                    <td class="aksi-sel"><a href="#" class="tautan">Setujui</a> · <a href="#" class="tautan tautan--merah">Tolak</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
