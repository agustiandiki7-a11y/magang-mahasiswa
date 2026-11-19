@extends('layouts.panel')

@section('judul', 'Penilaian Mahasiswa')
@section('peran', 'mentor')

@section('konten')

    {{-- Header Halaman --}}
    <div class="topbar">
        <div>
            <h1>Penilaian Mahasiswa</h1>
            <p class="sub">Berikan penilaian akhir kepada mahasiswa bimbinganmu.</p>
        </div>

        <div class="topbar__aksi">
            <span class="avatar">MT</span>
        </div>
    </div>


    {{-- Statistik Penilaian --}}
    <div class="stat-grid stat-grid--3">

        <div class="stat">
            <span class="ikon-kotak ikon-kotak--biru">
                @include('partials.ikon', ['nama' => 'users', 'ukuran' => 18])
            </span>
            <div>
                <small>Total Mahasiswa</small>
                <strong>{{ $lamarans->count() }}</strong>
            </div>
        </div>

        <div class="stat">
            <span class="ikon-kotak ikon-kotak--biru">
                @include('partials.ikon', ['nama' => 'file', 'ukuran' => 18])
            </span>
            <div>
                <small>Belum Dinilai</small>
                <strong>{{ $lamarans->whereNull('penilaian')->count() }}</strong>
            </div>
        </div>

        <div class="stat">
            <span class="ikon-kotak ikon-kotak--biru">
                @include('partials.ikon', ['nama' => 'check', 'ukuran' => 18])
            </span>
            <div>
                <small>Sudah Dinilai</small>
                <strong>{{ $lamarans->filter(fn($item) => $item->penilaian !== null)->count() }}</strong>
            </div>
        </div>

    </div>


    {{-- Daftar Mahasiswa --}}
    <h2 class="judul-seksi">Daftar Mahasiswa Bimbingan</h2>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>Posisi Magang</th>
                    <th>Status Penilaian</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($lamarans as $lamaran)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong>
                                {{ $lamaran->mahasiswa->nama ?? 'Mahasiswa' }}
                            </strong>
                        </td>

                        <td>
                            {{ $lamaran->lowongan->nama_posisi ?? '-' }}
                        </td>

                        <td>
                            {{ $lamaran->penilaian ? 'Sudah Dinilai' : 'Belum Dinilai' }}
                        </td>

                        <td>
                            {{ $lamaran->penilaian->nilai ?? '-' }}
                        </td>

                        <td>
                            <button type="button" class="btn btn-primary"
                                onclick="document.getElementById('form-penilaian-{{ $lamaran->id }}').hidden = false">
                                {{ $lamaran->penilaian ? 'Edit Nilai' : 'Beri Nilai' }}
                            </button>
                        </td>
                    </tr>

                    {{-- Form Penilaian --}}
                    <tr>
                        <td colspan="6">

                            <div id="form-penilaian-{{ $lamaran->id }}" class="card" hidden>

                                <h3>
                                    Penilaian {{ $lamaran->mahasiswa->nama ?? 'Mahasiswa' }}
                                </h3>

                                <form action="{{ route('mentor.penilaian.store', $lamaran->id) }}" method="POST">

                                    @csrf

                                    <div class="form-group">
                                        <label>Nilai Akhir (0-100)</label>

                                        <input type="number" name="nilai" class="form-control" min="0" max="100" step="0.01"
                                            value="{{ old('nilai', $lamaran->penilaian->nilai ?? '') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Evaluasi Mahasiswa</label>

                                        <textarea name="evaluasi" class="form-control" rows="4" maxlength="3000"
                                            required>{{ old('evaluasi', $lamaran->penilaian->evaluasi ?? '') }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Simpan Penilaian
                                    </button>

                                    <button type="button" class="btn"
                                        onclick="document.getElementById('form-penilaian-{{ $lamaran->id }}').hidden = true">
                                        Tutup
                                    </button>

                                </form>

                            </div>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6">
                            Belum ada mahasiswa yang ditugaskan kepada lu.
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>

@endsection
