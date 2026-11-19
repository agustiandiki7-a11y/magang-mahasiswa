<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('akun.login');
    }

    // Memproses login pengguna
    public function login(Request $request)
    {
        // Validasi data login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Memeriksa email dan password
        if (Auth::attempt($credentials)) {

            // Memperbarui session
            $request->session()->regenerate();

            // Mengambil role pengguna
            $role = Auth::user()->role;

            // Mengarahkan pengguna sesuai role
            return match ($role) {
                'admin' => redirect()->route('admin.dashboard'),

                'mentor' => redirect()->route('mentor.dashboard'),

                'mahasiswa' => redirect()->route('mahasiswa.dashboard'),

                default => $this->logoutUser($request),
            };
        }

        // Pesan error jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password yang kamu masukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus session lama
        $request->session()->invalidate();

        // Membuat token CSRF baru
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }

    // Logout jika role tidak dikenali
    private function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Role akun tidak dikenali.',
            ]);
    }
}
