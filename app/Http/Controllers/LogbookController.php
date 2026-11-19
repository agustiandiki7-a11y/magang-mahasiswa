<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logbook;
use App\Models\Lamaran;

class LogbookController extends Controller
{
    // Menampilkan logbook milik mahasiswa yang sedang login
    public function index()
    {
        $logbooks = Logbook::whereHas('lamaran', function ($query) {
            $query->where('mahasiswa_id', auth()->id())
                  ->where('status', 'Diterima');
        })->latest('tanggal')->get();

        return view('mahasiswa.logbook.index', compact('logbooks'));
    }


    // Menampilkan daftar logbook mahasiswa untuk mentor
    public function mentorIndex()
    {
        $logbooks = Logbook::whereHas('lamaran', function ($query) {
            $query->where('mentor_id', auth()->id());
        })
        ->with('lamaran')
        ->latest('tanggal')
        ->get();

        return view('mentor.logbook.index', compact('logbooks'));
    }


    // Menyimpan kegiatan harian mahasiswa
    public function store(Request $request)
    {
        $request->validate([
            'lamaran_id' => 'required|exists:lamaran,id',
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:2000',
            'hasil' => 'required|string|max:2000',
        ]);

        // Memastikan lamaran milik mahasiswa yang sedang login
        $lamaran = Lamaran::where('id', $request->lamaran_id)
            ->where('mahasiswa_id', auth()->id())
            ->where('status', 'Diterima')
            ->firstOrFail();

        // Membuat logbook baru
        Logbook::create([
            'lamaran_id' => $lamaran->id,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'hasil' => $request->hasil,
            'status_validasi' => 'Menunggu',
        ]);

        return back()->with('success', 'Logbook berhasil dikirim.');
    }


    // Memvalidasi logbook oleh mentor
    public function validasi(Request $request, $id)
    {
        $request->validate([
            'status_validasi' => 'required|in:Disetujui,Ditolak',
            'catatan_mentor' => 'nullable|string|max:1000',
        ]);

        // Memastikan logbook ditugaskan kepada mentor yang sedang login
        $logbook = Logbook::whereHas('lamaran', function ($query) {
            $query->where('mentor_id', auth()->id());
        })->findOrFail($id);

        $logbook->update([
            'status_validasi' => $request->status_validasi,
            'catatan_mentor' => $request->catatan_mentor,
        ]);

        return back()->with('success', 'Logbook berhasil divalidasi.');
    }
}
