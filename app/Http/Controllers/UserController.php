<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // =========================
    // DATA USER
    // =========================
    public function index()
    {
        $users = DB::table('tb_user')
            ->orderBy('id_user', 'asc')
            ->get();

        return view('admin.user.index', compact('users'));
    }


    // =========================
    // FORM TAMBAH USER
    // =========================
    public function create()
    {
        return view('admin.user.create');
    }


    // =========================
    // SIMPAN USER
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:tb_user,username',
            'password' => 'required',
            'role' => 'required|in:admin,petugas,owner',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'username.unique' => 'Username sudah digunakan!',
            'password.required' => 'Password wajib diisi!',
            'role.required' => 'Role wajib dipilih!',
        ]);

        DB::table('tb_user')->insert([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan!');
    }


    // =========================
    // FORM EDIT USER
    // =========================
    public function edit($id)
    {
        $user = DB::table('tb_user')
            ->where('id_user', $id)
            ->first();

        if (!$user) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'User tidak ditemukan!');
        }

        return view('admin.user.edit', compact('user'));
    }


    // =========================
    // UPDATE USER
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:tb_user,username,' . $id . ',id_user',
            'password' => 'required',
            'role' => 'required|in:admin,petugas,owner',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'username.unique' => 'Username sudah digunakan!',
            'password.required' => 'Password wajib diisi!',
            'role.required' => 'Role wajib dipilih!',
        ]);

        DB::table('tb_user')
            ->where('id_user', $id)
            ->update([
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'password' => $request->password,
                'role' => $request->role,
            ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui!');
    }


    // =========================
    // HAPUS USER
    // =========================
    public function destroy($id)
    {
        // Cek apakah user masih digunakan
        // oleh log aktivitas
        $adaLog = DB::table('tb_log_aktivitas')
            ->where('id_user', $id)
            ->exists();

        if ($adaLog) {
            return redirect()
                ->route('admin.user.index')
                ->with(
                    'error',
                    'User tidak dapat dihapus karena masih memiliki riwayat aktivitas!'
                );
        }

        // Cek apakah user masih digunakan
        // oleh transaksi
        $adaTransaksi = DB::table('tb_transaksi')
            ->where('id_user', $id)
            ->exists();

        if ($adaTransaksi) {
            return redirect()
                ->route('admin.user.index')
                ->with(
                    'error',
                    'User tidak dapat dihapus karena masih memiliki data transaksi!'
                );
        }

        // Kalau tidak memiliki relasi,
        // user boleh dihapus
        DB::table('tb_user')
            ->where('id_user', $id)
            ->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil dihapus!');
    }
}