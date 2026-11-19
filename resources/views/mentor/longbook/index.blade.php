@extends('layouts.panel')

@section('judul', 'Logbook Mahasiswa')
@section('peran', 'mentor')

@section('konten')

    <div class="topbar">
        <div>
            <h1>Logbook Mahasiswa</h1>
            <p class="sub">Periksa dan validasi kegiatan harian mahasiswa bimbingan.</p>
        </div>

        <div class="topbar__aksi">
            <span class="avatar">MT</span>
        </div>
    </div>

    {{-- Informasi halaman --}}
    <div class="stat-grid stat-grid--3">
        <div class="stat">
            <span class="ikon-kotak ikon-kotak--biru">
                @include('partials.ikon', ['nama' => 'file', 'ukuran' => 18])
            </span>
            <div>
                <small>Total Logbook</small>
                <strong>{{ $logbooks->count() }}</strong>
            </div>
        </div>

        <div class="stat">
            <span class="ikon-kotak ikon-kotak--biru">
                @include('partials.ikon', ['nama' => 'clock', 'ukuran' => 18])
            </span>
            <div>
                <small>Menunggu Validasi</small>
                <strong>{{ $logbooks->where('status_validasi', 'Menunggu')->count() }}</strong>
            </div>
        </div>

        <div class="stat">
            <span class="ikon-kotak ikon-kotak--biru">
                @include('partials.ikon', ['nama' => 'check', 'ukuran' => 18])
            </span>
            <div>
                <small>Sudah Disetujui</small>
                <strong>{{ $logbooks->where('status_validasi', 'Disetujui')->count() }}</strong>
            </div>
        </div>
    </div>

    {{-- Daftar Logbook --}}
    <h2 class="judul-seksi">Daftar Kegiatan Mahasiswa</h2>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Mahasiswa</th>
                    <th>Tanggal</th>
                    <th>Kegiatan</th>
                    <th>Hasil</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($logbooks as $logbook)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $logbook->lamaran->mahasiswa->nama ?? 'Mahasiswa' }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($logbook->tanggal)->format('d/m/Y') }}
                        </td>

                        <td>{{ $logbook->kegiatan }}</td>

                        <td>{{ $logbook->hasil }}</td>

                        <td>{{ $logbook->status_validasi }}</td>

                        <td>
                            @if ($logbook->status_validasi === 'Menunggu')
                                <form action="{{ route('mentor.logbook.validasi', $logbook->id) }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <select name="status_validasi" required>
                                        <option value="Disetujui">Setujui</option>
                                        <option value="Ditolak">Tolak</option>
                                    </select>

                                    <textarea name="catatan_mentor" placeholder="Catatan mentor (opsional)"></textarea>

                                    <button type="submit" class="btn btn-primary">
                                        Simpan Validasi
                                    </button>
                                </form>
                            @else
                                <span>{{ $logbook->catatan_mentor ?: 'Sudah divalidasi' }}</span>
                            @endif
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7">
                            Belum ada logbook mahasiswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
