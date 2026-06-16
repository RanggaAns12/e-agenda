<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan baris ini
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Jika user belum login atau rolenya tidak sesuai, tolak akses (Error 403)
        if (!Auth::check() || $request->user()->role !== $role) {
            abort(403, 'Akses ditolak. Anda bukan ' . $role);
        }

        return $next($request);
    }
}