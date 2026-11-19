@extends('layouts.akun')

@section('judul', 'Masuk')

@section('konten')

    {{-- Judul Halaman --}}
    <h1>Selamat Datang</h1>
    <p class="akun__sub">
        Masuk untuk melanjutkan ke akun Anda
    </p>

    {{-- Notifikasi Berhasil --}}
    @if (session('sukses') || session('success') || session('status'))
        <div class="peringatan peringatan--sukses" role="status">
            {{ session('sukses') ?? session('success') ?? session('status') }}
        </div>
    @endif

    {{-- Form Login --}}
    <form method="POST" action="{{ route('login.process') }}" class="form">
        @csrf

        {{-- Input Email --}}
        <div class="field">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" aria-label="Email"
                autocomplete="username" required>

            @error('email')
                <small class="galat">{{ $message }}</small>
            @enderror
        </div>

        {{-- Input Password --}}
        <div class="field field--sandi">
            <input type="password" name="password" id="sandi" placeholder="Password" aria-label="Password"
                autocomplete="current-password" required>

            <button type="button" class="mata" data-toggle-sandi="#sandi" aria-label="Tampilkan password">
                @include('partials.ikon', [
                    'nama' => 'eye',
                    'ukuran' => 18
                ])
            </button>

            @error('password')
                <small class="galat">{{ $message }}</small>
            @enderror
        </div>

        {{-- Pengaturan Login --}}
        <div class="form__baris">
            <label class="cek">
                <input type="checkbox" name="ingat" value="1">
                Ingat saya
            </label>

            <a href="#" class="tautan">
                Lupa password?
            </a>
        </div>

        {{-- Tombol Masuk --}}
        <button type="submit" class="btn btn-primary btn-block">
            Masuk
            @include('partials.ikon', [
                'nama' => 'arrow',
                'ukuran' => 16
            ])
        </button>

    </form>

    {{-- Link Pendaftaran --}}
    @if (\Illuminate\Support\Facades\Route::has('daftar'))
        <p class="akun__bawah">
            Belum punya akun?
            <a href="{{ route('daftar') }}" class="tautan">
                Daftar di sini
            </a>
        </p>
    @endif

@endsection
