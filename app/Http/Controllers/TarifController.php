<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarifController extends Controller
{
    // MENAMPILKAN DATA TARIF
    public function index()
    {
        $tarifs = DB::table('tb_tarif')->get();

        return view('admin.tarif.index', compact('tarifs'));
    }


    // HALAMAN TAMBAH TARIF
    public function create()
    {
        return view('admin.tarif.create');
    }


    // SIMPAN TARIF
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required|numeric|min:0',
        ]);

        DB::table('tb_tarif')->insert([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif_per_jam' => $request->tarif_per_jam,
        ]);

        return redirect()
            ->route('admin.tarif.index')
            ->with('success', 'Tarif berhasil ditambahkan!');
    }


    // HALAMAN EDIT TARIF
    public function edit($id)
    {
        $tarif = DB::table('tb_tarif')
            ->where('id_tarif', $id)
            ->first();

        return view('admin.tarif.edit', compact('tarif'));
    }


    // UPDATE TARIF
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required|numeric|min:0',
        ]);

        DB::table('tb_tarif')
            ->where('id_tarif', $id)
            ->update([
                'jenis_kendaraan' => $request->jenis_kendaraan,
                'tarif_per_jam' => $request->tarif_per_jam,
            ]);

        return redirect()
            ->route('admin.tarif.index')
            ->with('success', 'Tarif berhasil diupdate!');
    }


    // HAPUS TARIF
    public function destroy($id)
    {
        // CEK APAKAH TARIF SUDAH DIGUNAKAN DI TRANSAKSI
        $adaTransaksi = DB::table('tb_transaksi')
            ->where('id_tarif', $id)
            ->exists();

        if ($adaTransaksi) {
            return redirect()
                ->route('admin.tarif.index')
                ->with(
                    'error',
                    'Tarif tidak bisa dihapus karena sudah digunakan dalam transaksi!'
                );
        }

        DB::table('tb_tarif')
            ->where('id_tarif', $id)
            ->delete();

        return redirect()
            ->route('admin.tarif.index')
            ->with('success', 'Tarif berhasil dihapus!');
    }
}