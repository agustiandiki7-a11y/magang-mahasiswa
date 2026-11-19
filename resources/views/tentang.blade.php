@extends('layouts.publik')

@section('judul', 'Tentang')

@section('konten')
<section class="page-hero" style="background-image:url('{{ asset('assets/img/foto/laptop.jpg') }}')">
    <div class="wadah"><h1>Tentang MagangKu</h1></div>
</section>

<section class="bagian">
    <div class="wadah dua-kolom">
        <div>
            <span class="eyebrow">Platform</span>
            <h2 class="judul-besar">Platform magang mahasiswa untuk masa depan yang lebih baik</h2>
            <p>MagangKu membantu mahasiswa menemukan, mengajukan, dan memantau program magang dalam satu tempat. Perusahaan, kampus, dan mentor terhubung dalam alur yang jelas dan transparan.</p>
            <a href="{{ route('lowongan') }}" class="btn btn-primary">Lihat Lowongan @include('partials.ikon', ['nama' => 'arrow', 'ukuran' => 16])</a>
        </div>
        <div class="kartu-putih keunggulan">
            <h3>Keunggulan Desain</h3>
            <ul>
                @foreach ([
                    ['Modern & Profesional', 'Tampilan elegan dan kredibel'],
                    ['User Friendly', 'Mudah digunakan oleh mahasiswa'],
                    ['Responsif', 'Optimal di semua perangkat'],
                    ['Terstruktur', 'Informasi jelas dan terorganisir'],
                    ['Siap Dikembangkan', 'Mudah integrasi dengan backend'],
                ] as [$j, $t])
                    <li>
                        <span class="bulat-centang">@include('partials.ikon', ['nama' => 'check', 'ukuran' => 12])</span>
                        <div><strong>{{ $j }}</strong><small>{{ $t }}</small></div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection
