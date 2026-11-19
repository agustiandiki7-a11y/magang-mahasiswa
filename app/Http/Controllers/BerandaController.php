<?php

namespace App\Http\Controllers;

use App\Support\DataDemo;

class BerandaController extends Controller
{
    public function beranda()
    {
        return view('index', ['mitra' => DataDemo::mitra()]);
    }

    public function informasi()
    {
        return view('informasi');
    }

    public function lowongan()
    {
        return view('lowongan.lowongan', ['daftar' => DataDemo::lowongan()]);
    }

    public function detail(int $id)
    {
        $semua = DataDemo::lowongan();
        abort_unless(isset($semua[$id]), 404);

        return view('lowongan.detail', ['item' => $semua[$id]]);
    }

    public function tentang()
    {
        return view('tentang');
    }
}
