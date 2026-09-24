<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // =========================
    // HALAMAN LOGIN
    // =========================
    public function index()
    {
        return view('login');
    }

    // =========================
    // PROSES LOGIN
    // =========================
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('tb_user')
            ->where('username', $request->username)
            ->first();

        if (!$user) {
            return back()
                ->withInput($request->only('username'))
                ->with('error', 'Username atau password salah!');
        }

        if ($request->password !== $user->password) {
            return back()
                ->withInput($request->only('username'))
                ->with('error', 'Username atau password salah!');
        }

        session([
            'id_user' => $user->id_user,
            'nama_lengkap' => $user->nama_lengkap,
            'username' => $user->username,
            'role' => $user->role,
        ]);

        switch ($user->role) {

            case 'admin':
                return redirect()->route('admin.dashboard');

            case 'petugas':
                return redirect()->route('petugas.dashboard');

            case 'owner':
                return redirect()->route('owner.dashboard');

            default:
                $request->session()->flush();

                return redirect()
                    ->route('login')
                    ->with('error', 'Role user tidak dikenali!');
        }
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()
            ->route('login')
            ->with('success', 'Berhasil logout!');
    }
}