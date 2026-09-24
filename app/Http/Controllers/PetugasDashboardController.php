<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PetugasDashboardController extends Controller
{
    public function index()
    {
        // ==========================================
        // TEST: PASTIKAN CONTROLLER INI DIPANGGIL
        // ==========================================

        // HAPUS tanda // di bawah ini untuk mengetes
        // dd('PETUGAS DASHBOARD CONTROLLER BERHASIL DIPANGGIL');


        // ==========================================
        // 1. KENDARAAN YANG MASIH PARKIR
        // ==========================================

        $sedangParkir = DB::table('tb_transaksi')
            ->where('status', 'masuk')
            ->count();


        // ==========================================
        // 2. TOTAL KENDARAAN MASUK HARI INI
        // ==========================================

        $totalHariIni = DB::table('tb_transaksi')
            ->whereDate('waktu_masuk', Carbon::today())
            ->count();


        // ==========================================
        // 3. PENDAPATAN HARI INI
        // ==========================================

        $pendapatanHariIni = DB::table('tb_transaksi')
            ->where('status', 'keluar')
            ->whereDate('waktu_keluar', Carbon::today())
            ->sum('biaya_total');


        // ==========================================
        // 4. RATA-RATA DURASI
        // ==========================================

        $rataDurasi = DB::table('tb_transaksi')
            ->where('status', 'keluar')
            ->whereNotNull('durasi_jam')
            ->avg('durasi_jam');


        $rataDurasi = $rataDurasi ?? 0;


        // Format durasi

        $jam = floor($rataDurasi);

        $menit = round(($rataDurasi - $jam) * 60);


        // Kalau menit menjadi 60

        if ($menit >= 60) {

            $jam++;

            $menit = 0;

        }


        $rataDurasiFormat = $jam . 'j ' . $menit . 'm';


        // ==========================================
        // 5. KENDARAAN TERBARU
        // ==========================================

        $kendaraanTerbaru = DB::table('tb_transaksi')
            ->join(
                'tb_kendaraan',
                'tb_transaksi.id_kendaraan',
                '=',
                'tb_kendaraan.id_kendaraan'
            )
            ->select(
                'tb_transaksi.id_parkir',
                'tb_transaksi.waktu_masuk',
                'tb_transaksi.waktu_keluar',
                'tb_transaksi.status',
                'tb_transaksi.biaya_total',
                'tb_kendaraan.plat_nomor',
                'tb_kendaraan.jenis_kendaraan'
            )
            ->orderBy('tb_transaksi.waktu_masuk', 'desc')
            ->limit(6)
            ->get();


        // ==========================================
        // 6. TOTAL SLOT PARKIR
        // ==========================================

        $totalSlot = DB::table('tb_area_parkir')
            ->sum('kapasitas') ?? 0;


        // ==========================================
        // 7. SLOT TERISI
        // ==========================================

        $slotTerisi = DB::table('tb_area_parkir')
            ->sum('terisi') ?? 0;


        // ==========================================
        // 8. SLOT KOSONG
        // ==========================================

        $slotKosong = max(0, $totalSlot - $slotTerisi);


        // ==========================================
        // 9. PERSENTASE SLOT TERISI
        // ==========================================

        $persentaseTerisi = $totalSlot > 0
            ? round(($slotTerisi / $totalSlot) * 100)
            : 0;


        // ==========================================
        // KIRIM DATA KE VIEW
        // ==========================================

        return view('petugas.dashboard', [
            'sedangParkir' => $sedangParkir,
            'totalHariIni' => $totalHariIni,
            'pendapatanHariIni' => $pendapatanHariIni,
            'rataDurasiFormat' => $rataDurasiFormat,
            'kendaraanTerbaru' => $kendaraanTerbaru,
            'totalSlot' => $totalSlot,
            'slotTerisi' => $slotTerisi,
            'slotKosong' => $slotKosong,
            'persentaseTerisi' => $persentaseTerisi,
        ]);
    }
}