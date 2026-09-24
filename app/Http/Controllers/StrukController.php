<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StrukController extends Controller
{
    // =========================
    // TAMPILKAN STRUK
    // =========================
    public function show($id)
    {
        $transaksi = DB::table('tb_transaksi')
            ->join(
                'tb_kendaraan',
                'tb_transaksi.id_kendaraan',
                '=',
                'tb_kendaraan.id_kendaraan'
            )
            ->join(
                'tb_area_parkir',
                'tb_transaksi.id_area',
                '=',
                'tb_area_parkir.id_area'
            )
            ->join(
                'tb_tarif',
                'tb_transaksi.id_tarif',
                '=',
                'tb_tarif.id_tarif'
            )
            ->select(
                'tb_transaksi.*',
                'tb_kendaraan.plat_nomor',
                'tb_kendaraan.jenis_kendaraan',
                'tb_kendaraan.pemilik',
                'tb_area_parkir.nama_area',
                'tb_tarif.tarif_per_jam'
            )
            ->where('tb_transaksi.id_parkir', $id)
            ->first();

        if (!$transaksi) {
            return redirect()
                ->route('petugas.transaksi.index')
                ->with('error', 'Data transaksi tidak ditemukan!');
        }

        return view('petugas.struk.show', compact('transaksi'));
    }


    // =========================
    // CETAK STRUK
    // =========================
    public function cetak($id)
    {
        return $this->show($id);
    }
}