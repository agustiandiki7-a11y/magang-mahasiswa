@extends('layouts.panel')

@section('judul', 'Dashboard Mentor')
@section('peran', 'mentor')

@section('konten')
<div class="topbar">
    <div><h1>Halo, Mentor 👋</h1><p class="sub">Pantau perkembangan mahasiswa bimbinganmu.</p></div>
    <div class="topbar__aksi"><span class="avatar">MT</span></div>
</div>

<div class="stat-grid stat-grid--3">
    @foreach ([['Mahasiswa Bimbingan', '8', 'users'], ['Laporan Menunggu', '3', 'file'], ['Sesi Minggu Ini', '5', 'calendar']] as [$l, $n, $i])
        <div class="stat"><span class="ikon-kotak ikon-kotak--biru">@include('partials.ikon', ['nama' => $i, 'ukuran' => 18])</span><div><small>{{ $l }}</small><strong>{{ $n }}</strong></div></div>
    @endforeach
</div>

<h2 class="judul-seksi">Mahasiswa Bimbingan</h2>
<ul class="bimbingan">
    @foreach ([['Diki Pratama', 'Frontend Developer Intern', 72], ['Sinta Maharani', 'UI/UX Design Intern', 55], ['Rizky Ananda', 'Business Analyst Intern', 30]] as [$n, $p, $pr])
        <li>
            <span class="avatar">{{ strtoupper(substr($n, 0, 1)) }}</span>
            <div class="bimbingan__info"><strong>{{ $n }}</strong><small>{{ $p }}</small></div>
            <div class="progres" role="progressbar" aria-valuenow="{{ $pr }}" aria-valuemin="0" aria-valuemax="100"><i style="width:{{ $pr }}%"></i></div>
            <span class="persen">{{ $pr }}%</span>
        </li>
    @endforeach
</ul>
@endsection
