<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Lamaran;

class PenilaianController extends Controller
{
    // Menampilkan daftar mahasiswa yang bisa dinilai mentor
    public function index()
    {
        $lamarans = Lamaran::with(['mahasiswa', 'lowongan', 'penilaian'])
            ->where('mentor_id', auth()->id())
            ->where('status', 'Diterima')
            ->latest()
            ->get();

        return view('mentor.penilaian.index', compact('lamarans'));
    }

    // Menyimpan penilaian akhir mahasiswa
    public function store(Request $request, $lamaran_id)
    {
        $request->validate([
            'nilai' => 'required|numeric|min:0|max:100',
            'evaluasi' => 'required|string|max:3000',
        ]);

        // Memastikan lamaran ditangani mentor yang sedang login
        $lamaran = Lamaran::where('id', $lamaran_id)
            ->where('mentor_id', auth()->id())
            ->where('status', 'Diterima')
            ->firstOrFail();

        // Mencegah penilaian ganda untuk satu lamaran
        Penilaian::updateOrCreate(
            ['lamaran_id' => $lamaran->id],
            [
                'nilai' => $request->nilai,
                'evaluasi' => $request->evaluasi,
            ]
        );

        return back()->with('success', 'Penilaian berhasil disimpan.');
    }
}
