<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = DB::table('tb_kendaraan')->get();

        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('admin.kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required',
            'pemilik' => 'required',
        ]);

        DB::table('tb_kendaraan')->insert([
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'pemilik' => $request->pemilik,
        ]);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kendaraan = DB::table('tb_kendaraan')
            ->where('id_kendaraan', $id)
            ->first();

        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required',
            'pemilik' => 'required',
        ]);

        DB::table('tb_kendaraan')
            ->where('id_kendaraan', $id)
            ->update([
                'plat_nomor' => $request->plat_nomor,
                'jenis_kendaraan' => $request->jenis_kendaraan,
                'pemilik' => $request->pemilik,
            ]);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $adaTransaksi = DB::table('tb_transaksi')
            ->where('id_kendaraan', $id)
            ->exists();

        if ($adaTransaksi) {
            return redirect()
                ->route('admin.kendaraan.index')
                ->with('error', 'Kendaraan tidak bisa dihapus karena sudah memiliki riwayat transaksi!');
        }

        DB::table('tb_kendaraan')
            ->where('id_kendaraan', $id)
            ->delete();

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus!');
    }
}