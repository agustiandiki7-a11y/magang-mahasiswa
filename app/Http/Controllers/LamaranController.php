<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;
use App\Models\LowonganMagang;
use Illuminate\Support\Facades\Storage;

class LamaranController extends Controller
{
    // Menampilkan daftar lamaran
    public function index()
    {
        $lamarans = Lamaran::with(['mahasiswa', 'lowongan', 'mentor'])
            ->latest()
            ->get();

        return view('admin.lamaran.index', compact('lamarans'));
    }

    // Menampilkan form pengajuan magang
    public function create($lowongan_id)
    {
        $lowongan = LowonganMagang::where('status', 'Dibuka')
            ->findOrFail($lowongan_id);

        return view('mahasiswa.lamaran.create', compact('lowongan'));
    }

    // Menyimpan pengajuan magang
    public function store(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan_magang,id',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
        ]);

        $lowongan = LowonganMagang::where('status', 'Dibuka')
            ->findOrFail($request->lowongan_id);

        // Memastikan mahasiswa belum pernah melamar lowongan yang sama
        $sudahMelamar = Lamaran::where('mahasiswa_id', auth()->id())
            ->where('lowongan_id', $lowongan->id)
            ->exists();

        if ($sudahMelamar) {
            return back()->with('error', 'Kamu sudah melamar lowongan ini.');
        }

        // Menyimpan file ke penyimpanan privat
        $cv = $request->file('cv')->store('lamaran/cv', 'local');
        $surat = $request->file('surat_pengantar')
            ->store('lamaran/surat', 'local');

        Lamaran::create([
            'mahasiswa_id' => auth()->id(),
            'lowongan_id' => $lowongan->id,
            'cv' => $cv,
            'surat_pengantar' => $surat,
            'status' => 'Menunggu',
        ]);

        return redirect()->back()
            ->with('success', 'Lamaran berhasil dikirim.');
    }

    // Menampilkan riwayat lamaran mahasiswa
    public function riwayat()
    {
        $lamarans = Lamaran::with('lowongan')
            ->where('mahasiswa_id', auth()->id())
            ->latest()
            ->get();

        return view('mahasiswa.lamaran.riwayat', compact('lamarans'));
    }

    // Memproses status lamaran oleh Admin HRD
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diterima,Ditolak',
            'catatan' => 'nullable|string|max:1000',
        ]);

        $lamaran = Lamaran::findOrFail($id);

        $lamaran->update([
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return back()->with('success', 'Status lamaran berhasil diperbarui.');
    }
}
