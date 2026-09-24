<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    /**
     * Menampilkan rekap transaksi untuk Owner
     */
    public function index()
    {
        // ==============================
        // TOTAL SEMUA TRANSAKSI
        // ==============================
        $totalTransaksi = DB::table('tb_transaksi')
            ->count();


        // ==============================
        // TOTAL PENDAPATAN
        // HANYA TRANSAKSI YANG SUDAH KELUAR
        // ==============================
        $totalPendapatan = DB::table('tb_transaksi')
            ->where('status', 'keluar')
            ->sum('biaya_total');


        // ==============================
        // DATA TRANSAKSI
        // ==============================
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
                'tb_transaksi.id_parkir',
                'tb_transaksi.waktu_masuk',
                'tb_transaksi.waktu_keluar',
                'tb_transaksi.durasi_jam',
                'tb_transaksi.biaya_total',
                'tb_transaksi.status',

                'tb_kendaraan.plat_nomor',
                'tb_kendaraan.jenis_kendaraan',
                'tb_kendaraan.pemilik',

                'tb_area_parkir.nama_area',

                'tb_tarif.tarif_per_jam'
            )
            ->orderBy('tb_transaksi.id_parkir', 'desc')
            ->get();


        // ==============================
        // KIRIM DATA KE VIEW
        // ==============================
        return view(
            'owner.rekap.index',
            compact(
                'totalTransaksi',
                'totalPendapatan',
                'transaksi'
            )
        );
    }


    /**
     * Menghapus transaksi
     */
    public function destroy($id)
    {
        // ==============================
        // CARI TRANSAKSI
        // ==============================
        $transaksi = DB::table('tb_transaksi')
            ->where('id_parkir', $id)
            ->first();


        // Jika transaksi tidak ditemukan
        if (!$transaksi) {
            return redirect()
                ->route('owner.rekap.index')
                ->with('error', 'Data transaksi tidak ditemukan!');
        }


        // ==============================
        // HANYA BOLEH HAPUS
        // TRANSAKSI YANG SUDAH KELUAR
        // ==============================
        if ($transaksi->status != 'keluar') {
            return redirect()
                ->route('owner.rekap.index')
                ->with(
                    'error',
                    'Transaksi yang masih parkir tidak boleh dihapus!'
                );
        }


        // ==============================
        // HAPUS TRANSAKSI
        // ==============================
        DB::table('tb_transaksi')
            ->where('id_parkir', $id)
            ->delete();


        // ==============================
        // KEMBALI KE REKAP
        // ==============================
        return redirect()
            ->route('owner.rekap.index')
            ->with(
                'success',
                'Data transaksi berhasil dihapus!'
            );
    }
}