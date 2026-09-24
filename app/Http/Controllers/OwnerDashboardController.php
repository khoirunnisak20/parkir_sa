<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        // =====================================
        // TOTAL SEMUA TRANSAKSI
        // =====================================
        $totalTransaksi = DB::table('tb_transaksi')
            ->count();


        // =====================================
        // TOTAL PENDAPATAN
        // =====================================
        $totalPendapatan = DB::table('tb_transaksi')
            ->where('status', 'keluar')
            ->sum('biaya_total');


        // =====================================
        // PENDAPATAN HARI INI
        // =====================================
        $pendapatanHariIni = DB::table('tb_transaksi')
            ->where('status', 'keluar')
            ->whereDate('waktu_keluar', Carbon::today())
            ->sum('biaya_total');


        // =====================================
        // KENDARAAN MASIH PARKIR
        // =====================================
        $sedangParkir = DB::table('tb_transaksi')
            ->where('status', 'masuk')
            ->count();


        // =====================================
        // TOTAL KAPASITAS PARKIR
        // =====================================
        $totalSlot = DB::table('tb_area_parkir')
            ->sum('kapasitas');


        // =====================================
        // SLOT YANG TERISI
        // =====================================
        $slotTerisi = DB::table('tb_area_parkir')
            ->sum('terisi');


        // =====================================
        // SLOT KOSONG
        // =====================================
        $slotKosong = $totalSlot - $slotTerisi;


        // =====================================
        // PERSENTASE SLOT TERISI
        // =====================================
        if ($totalSlot > 0) {

            $persentaseTerisi = round(
                ($slotTerisi / $totalSlot) * 100
            );

        } else {

            $persentaseTerisi = 0;

        }


        // =====================================
        // TRANSAKSI TERBARU
        // =====================================
        $transaksiTerbaru = DB::table('tb_transaksi')
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
            ->select(
                'tb_transaksi.*',
                'tb_kendaraan.plat_nomor',
                'tb_kendaraan.jenis_kendaraan',
                'tb_kendaraan.pemilik',
                'tb_area_parkir.nama_area'
            )
            ->orderBy('tb_transaksi.id_parkir', 'desc')
            ->limit(6)
            ->get();


        // =====================================
        // KIRIM DATA KE DASHBOARD
        // =====================================
        return view(
            'owner.dashboard',
            compact(
                'totalTransaksi',
                'totalPendapatan',
                'pendapatanHariIni',
                'sedangParkir',
                'totalSlot',
                'slotTerisi',
                'slotKosong',
                'persentaseTerisi',
                'transaksiTerbaru'
            )
        );
    }
}