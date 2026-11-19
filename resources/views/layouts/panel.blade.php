@php $peran = trim($__env->yieldContent('peran')) ?: 'mahasiswa'; @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('judul', 'Dashboard') — MagangKu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/panel.css') }}">
    @stack('css')
</head>
<body class="halaman-panel">
    <div class="panel">
        @include('partials.sidebar', ['peran' => $peran])
        <div class="panel__isi">
            <button type="button" class="panel__toggle" id="tombolSidebar" aria-label="Buka menu samping">@include('partials.ikon', ['nama' => 'menu', 'ukuran' => 22])</button>
            @if (session('sukses'))
                <div class="peringatan peringatan--sukses" role="status">{{ session('sukses') }}</div>
            @endif
            @yield('konten')
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('js')
</body>
</html>
