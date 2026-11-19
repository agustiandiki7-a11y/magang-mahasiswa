@extends('layouts.panel')

@section('judul', 'Profil Mahasiswa')
@section('peran', 'mahasiswa')

@section('konten')
<h1>Profil Mahasiswa</h1>
<div class="profil-kepala">
    <span class="avatar avatar--besar">DP</span>
    <div>
        <h2>{{ auth()->user()->name ?? 'Diki Pratama' }}</h2>
        <small>NIM 12345678</small><br>
        <button type="button" class="btn btn-outline btn-xs">Ubah Foto</button>
    </div>
</div>

<div class="tab" role="tablist">
    <button type="button" class="aktif" role="tab" data-tab="pribadi">Data Pribadi</button>
    <button type="button" role="tab" data-tab="pendidikan">Pendidikan</button>
    <button type="button" role="tab" data-tab="kontak">Kontak</button>
</div>

<div class="tab-isi" data-panel="pribadi">
    <dl class="ringkasan"><dt>Nama Lengkap</dt><dd>Diki Pratama</dd><dt>NIM</dt><dd>12345678</dd><dt>Email</dt><dd>diki@mail.com</dd></dl>
</div>
<div class="tab-isi" data-panel="pendidikan" hidden>
    <dl class="ringkasan"><dt>Universitas</dt><dd>Universitas Contoh</dd><dt>Program Studi</dt><dd>Teknik Informatika</dd><dt>Semester</dt><dd>6</dd></dl>
</div>
<div class="tab-isi" data-panel="kontak" hidden>
    <dl class="ringkasan"><dt>Telepon</dt><dd>0812-3456-7890</dd><dt>Alamat</dt><dd>Yogyakarta</dd></dl>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/js/profil.js') }}"></script>
@endpush
