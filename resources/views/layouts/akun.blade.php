<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('judul', 'Masuk') — MagangKu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/akun.css') }}">
</head>
<body class="halaman-akun">
    <main class="akun">
        <div class="akun__kartu">
            <div class="akun__logo">@include('partials.logo')</div>
            @yield('konten')
        </div>
    </main>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('js')
</body>
</html>
