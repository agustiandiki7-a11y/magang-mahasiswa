<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LowonganMagangController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\PenilaianController;


// ==================================================
// HALAMAN PUBLIK
// ==================================================

Route::controller(BerandaController::class)->group(function () {

    Route::get('/', 'beranda')->name('home');

    Route::get('/informasi', 'informasi')->name('informasi');

    Route::get('/lowongan', 'lowongan')->name('lowongan');

    Route::get('/lowongan/{id}', 'detail')
        ->whereNumber('id')
        ->name('lowongan.detail');

    Route::get('/tentang', 'tentang')->name('tentang');
});


// ==================================================
// LOGIN DAN LOGOUT
// ==================================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ==================================================
// ADMIN HRD
// ==================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        // Dashboard Admin
        Route::get('/', function () {
            return view('admin.admin');
        })->name('dashboard');

        // Manajemen Lowongan
        Route::resource('lowongan', LowonganMagangController::class);

        // Manajemen Lamaran
        Route::prefix('lamaran')
            ->name('lamaran.')
            ->group(function () {

                Route::get('/', [LamaranController::class, 'index'])
                    ->name('index');

                Route::patch('/{id}/status', [LamaranController::class, 'updateStatus'])
                    ->name('status');
            });
    });


// ==================================================
// MAHASISWA
// ==================================================

Route::prefix('mahasiswa')
    ->name('mahasiswa.')
    ->middleware(['auth', 'role:mahasiswa'])
    ->group(function () {

        // Dashboard Mahasiswa
        Route::get('/', function () {
            return view('mahasiswa.mahasiswa');
        })->name('dashboard');

        // Profil Mahasiswa
        Route::get('/profil', function () {
            return view('mahasiswa.profil');
        })->name('profil');

        // Pengajuan Lamaran
        Route::prefix('lamaran')
            ->name('lamaran.')
            ->group(function () {

                // Riwayat Lamaran
                Route::get('/riwayat', [LamaranController::class, 'riwayat'])
                    ->name('riwayat');

                // Form Pengajuan
                Route::get('/{lowongan_id}', [LamaranController::class, 'create'])
                    ->whereNumber('lowongan_id')
                    ->name('create');

                // Simpan Lamaran
                Route::post('/', [LamaranController::class, 'store'])
                    ->name('store');
            });

        // Logbook Mahasiswa
        Route::prefix('logbook')
            ->name('logbook.')
            ->group(function () {

                Route::get('/', [LogbookController::class, 'index'])
                    ->name('index');

                Route::post('/', [LogbookController::class, 'store'])
                    ->name('store');
            });
    });


// ==================================================
// MENTOR
// ==================================================

Route::prefix('mentor')
    ->name('mentor.')
    ->middleware(['auth', 'role:mentor'])
    ->group(function () {

        // Dashboard Mentor
        Route::get('/', function () {
            return view('mentor.mentor');
        })->name('dashboard');

        // Logbook Mahasiswa
        Route::prefix('logbook')
            ->name('logbook.')
            ->group(function () {

                // Menampilkan daftar logbook untuk mentor
                Route::get('/', [LogbookController::class, 'mentorIndex'])
                    ->name('index');

                // Validasi Logbook
                Route::patch('/{id}/validasi', [LogbookController::class, 'validasi'])
                    ->name('validasi');
            });

        // Penilaian Mahasiswa
        Route::prefix('penilaian')
            ->name('penilaian.')
            ->group(function () {

                Route::get('/', [PenilaianController::class, 'index'])
                    ->name('index');

                Route::post('/{lamaran_id}', [PenilaianController::class, 'store'])
                    ->name('store');
            });
    });
