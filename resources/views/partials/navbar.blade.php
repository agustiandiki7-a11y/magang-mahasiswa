@php $aktif = $aktif ?? ''; @endphp
<header class="navbar">
    <div class="wadah navbar__isi">
        @include('partials.logo')
        <nav class="navbar__menu" id="menuUtama" aria-label="Menu utama">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'aktif' : '' }}">Beranda</a>
            <a href="{{ route('informasi') }}" class="{{ request()->routeIs('informasi') ? 'aktif' : '' }}">Informasi</a>
            <a href="{{ route('lowongan') }}" class="{{ request()->routeIs('lowongan*') ? 'aktif' : '' }}">Lowongan</a>
            <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'aktif' : '' }}">Tentang</a>
        </nav>
        <div class="navbar__aksi">
            <a href="{{ route('lowongan') }}" class="ikon-tombol" aria-label="Cari lowongan">@include('partials.ikon', ['nama' => 'search'])</a>
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Masuk @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 14])</a>
            <button type="button" class="navbar__toggle" id="tombolMenu" aria-label="Buka menu" aria-expanded="false" aria-controls="menuUtama">@include('partials.ikon', ['nama' => 'menu', 'ukuran' => 22])</button>
        </div>
    </div>
</header>
