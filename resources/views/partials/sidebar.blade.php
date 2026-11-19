@php
    $semua = [
        'mahasiswa' => [
            ['Dashboard', 'mahasiswa.dashboard', 'dashboard'],
            ['Pengajuan', 'lowongan', 'file'],
            ['Riwayat', 'mahasiswa.lamaran.riwayat', 'history'],
            ['Logbook', 'mahasiswa.logbook.index', 'calendar'],
            ['Profil', 'mahasiswa.profil', 'user'],
        ],

        'admin' => [
            ['Dashboard', 'admin.dashboard', 'dashboard'],
            ['Pengajuan', 'admin.lamaran.index', 'file'],
            ['Lowongan', 'admin.lowongan.index', 'briefcase'],
        ],

        'mentor' => [
            ['Dashboard', 'mentor.dashboard', 'dashboard'],
            ['Logbook', 'mentor.logbook.index', 'file'],
            ['Penilaian', 'mentor.penilaian.index', 'chart'],
        ],
    ];

    // Mengambil menu berdasarkan peran pengguna
    $daftarMenu = $semua[$peran] ?? [];

    // Menyembunyikan menu jika route belum tersedia
    $menu = array_values(array_filter($daftarMenu, function ($m) {
        return \Illuminate\Support\Facades\Route::has($m[1]);
    }));
@endphp

<aside class="sidebar" id="sidebar">

    {{-- Logo MagangKu --}}
    <div class="sidebar__logo">
        @include('partials.logo', ['terang' => true])
    </div>

    {{-- Navigasi Sidebar --}}
    <nav class="sidebar__menu" aria-label="Menu {{ $peran }}">

        @foreach ($menu as [$label, $rute, $ikon])

            @php
                // Menentukan menu yang sedang aktif
                $aktif = request()->routeIs($rute);

                // Menandai submenu berdasarkan kelompok route
                if (str_ends_with($rute, '.index')) {
                    $prefix = \Illuminate\Support\Str::beforeLast($rute, '.');

                    $aktif = request()->routeIs($prefix . '.*');
                } elseif ($rute === 'lowongan') {
                    $aktif = request()->routeIs('lowongan*');
                }
            @endphp

            <a href="{{ route($rute) }}" class="{{ $aktif ? 'aktif' : '' }}">

                @include('partials.ikon', ['nama' => $ikon])

                <span>{{ $label }}</span>
            </a>

        @endforeach

    </nav>

    {{-- Tombol Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="sidebar__keluar">

        @csrf

        <button type="submit">
            @include('partials.ikon', ['nama' => 'logout'])
            <span>Keluar</span>
        </button>

    </form>

</aside>
