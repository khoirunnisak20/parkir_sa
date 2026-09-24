<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // CEK APAKAH SUDAH LOGIN
        if (!session()->has('id_user')) {
            return redirect('/login')
                ->with('error', 'Silakan login terlebih dahulu!');
        }

        // CEK ROLE USER
        if (!in_array(session('role'), $roles)) {

            // ADMIN
            if (session('role') == 'admin') {
                return redirect('/admin/dashboard');
            }

            // PETUGAS
            if (session('role') == 'petugas') {
                return redirect('/petugas/dashboard');
            }

            // OWNER
            if (session('role') == 'owner') {
                return redirect('/owner/dashboard');
            }

            return redirect('/login');
        }

        return $next($request);
    }
}