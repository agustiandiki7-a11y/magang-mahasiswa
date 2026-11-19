<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    // Memeriksa hak akses berdasarkan role pengguna
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Mengambil pengguna yang sedang login
        $user = $request->user();

        // Menolak pengguna yang belum login
        if (!$user) {
            abort(401, 'Silakan login terlebih dahulu.');
        }

        // Memeriksa apakah role pengguna sesuai
        if (!in_array($user->role, $roles, true)) {
            abort(403, 'Kamu tidak memiliki akses ke halaman ini.');
        }

        // Melanjutkan permintaan jika akses diizinkan
        return $next($request);
    }
}
