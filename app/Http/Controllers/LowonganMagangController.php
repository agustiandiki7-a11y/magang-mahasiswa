<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LowonganMagang;

class LowonganMagangController extends Controller
{
    // Menampilkan semua lowongan magang
    public function index()
    {
        $lowongans = LowonganMagang::latest()->get();

        return view('admin.lowongan.index', compact('lowongans'));
    }

    // Menampilkan form tambah lowongan
    public function create()
    {
        return view('admin.lowongan.create');
    }

    // Menyimpan lowongan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_posisi' => 'required|string|max:150',
            'divisi' => 'required|string|max:100',
            'kuota' => 'required|integer|min:1',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
            'persyaratan' => 'required|string',
        ]);

        LowonganMagang::create([
            'admin_id' => auth()->id(),
            'nama_posisi' => $request->nama_posisi,
            'divisi' => $request->divisi,
            'kuota' => $request->kuota,
            'periode_mulai' => $request->periode_mulai,
            'periode_selesai' => $request->periode_selesai,
            'persyaratan' => $request->persyaratan,
            'status' => 'Dibuka',
        ]);

        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Lowongan magang berhasil ditambahkan.');
    }

    // Menampilkan form edit lowongan
    public function edit($id)
    {
        $lowongan = LowonganMagang::findOrFail($id);

        return view('admin.lowongan.edit', compact('lowongan'));
    }

    // Memperbarui data lowongan
    public function update(Request $request, $id)
    {
        $lowongan = LowonganMagang::findOrFail($id);

        $request->validate([
            'nama_posisi' => 'required|string|max:150',
            'divisi' => 'required|string|max:100',
            'kuota' => 'required|integer|min:1',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
            'persyaratan' => 'required|string',
            'status' => 'required|in:Dibuka,Ditutup',
        ]);

        $lowongan->update($request->only([
            'nama_posisi',
            'divisi',
            'kuota',
            'periode_mulai',
            'periode_selesai',
            'persyaratan',
            'status',
        ]));

        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Lowongan magang berhasil diperbarui.');
    }

    // Menghapus lowongan
    public function destroy($id)
    {
        $lowongan = LowonganMagang::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Lowongan magang berhasil dihapus.');
    }
}
