<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    // =====================================================
    // HALAMAN DAFTAR TRANSAKSI
    // =====================================================
    public function index()
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
            ->orderBy('tb_transaksi.id_parkir', 'desc')
            ->get();

        return view('petugas.transaksi.index', compact('transaksi'));
    }


    // =====================================================
    // HALAMAN TAMBAH KENDARAAN MASUK
    // =====================================================
    public function create()
    {
        // DATA KENDARAAN
        $kendaraans = DB::table('tb_kendaraan')
            ->orderBy('plat_nomor', 'asc')
            ->get();

        // DATA AREA YANG MASIH ADA SLOT
        $areas = DB::table('tb_area_parkir')
            ->whereColumn('terisi', '<', 'kapasitas')
            ->get();

        // DATA TARIF
        $tarifs = DB::table('tb_tarif')->get();

        return view(
            'petugas.transaksi.create',
            compact(
                'kendaraans',
                'areas',
                'tarifs'
            )
        );
    }


    // =====================================================
    // SIMPAN KENDARAAN MASUK
    // =====================================================
    public function store(Request $request)
    {
        $request->validate([
            'id_kendaraan' => 'required',
            'id_area'      => 'required',
            'id_tarif'     => 'required',
        ]);

        // CEK KENDARAAN MASIH PARKIR ATAU TIDAK
        $masihParkir = DB::table('tb_transaksi')
            ->where('id_kendaraan', $request->id_kendaraan)
            ->where('status', 'masuk')
            ->exists();

        if ($masihParkir) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Kendaraan tersebut masih berada di area parkir!'
                );
        }


        // AMBIL DATA AREA
        $area = DB::table('tb_area_parkir')
            ->where('id_area', $request->id_area)
            ->first();

        if (!$area) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Area parkir tidak ditemukan!'
                );
        }


        // CEK APAKAH AREA SUDAH PENUH
        if ($area->terisi >= $area->kapasitas) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Area parkir sudah penuh!'
                );
        }


        // =================================================
        // SIMPAN TRANSAKSI KENDARAAN MASUK
        // =================================================
        DB::table('tb_transaksi')->insert([
            'id_kendaraan' => $request->id_kendaraan,
            'waktu_masuk' => Carbon::now(),
            'waktu_keluar' => null,
            'id_tarif' => $request->id_tarif,
            'durasi_jam' => null,
            'biaya_total' => null,
            'status' => 'masuk',
            'id_user' => session('id_user'),
            'id_area' => $request->id_area,
        ]);


        // =================================================
        // OTOMATIS TAMBAH TERISI
        // =================================================
        DB::table('tb_area_parkir')
            ->where('id_area', $request->id_area)
            ->increment('terisi');


        // =================================================
        // CATAT LOG
        // =================================================
        if (session('id_user')) {
            DB::table('tb_log_aktivitas')->insert([
                'id_user' => session('id_user'),
                'aktivitas' => 'Menambahkan kendaraan masuk',
                'waktu_aktivitas' => Carbon::now(),
            ]);
        }


        return redirect()
            ->route('petugas.transaksi.index')
            ->with(
                'success',
                'Kendaraan berhasil masuk ke area parkir!'
            );
    }


    // =====================================================
    // PROSES KENDARAAN KELUAR
    // =====================================================
    public function keluar($id)
    {
        // AMBIL TRANSAKSI DAN TARIF
        $transaksi = DB::table('tb_transaksi')
            ->join(
                'tb_tarif',
                'tb_transaksi.id_tarif',
                '=',
                'tb_tarif.id_tarif'
            )
            ->select(
                'tb_transaksi.*',
                'tb_tarif.tarif_per_jam'
            )
            ->where('tb_transaksi.id_parkir', $id)
            ->first();

        // CEK DATA
        if (!$transaksi) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data transaksi tidak ditemukan!'
                );
        }


        // CEK STATUS
        if ($transaksi->status === 'keluar') {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Kendaraan sudah keluar!'
                );
        }


        // WAKTU KELUAR
        $waktuKeluar = Carbon::now();

        // WAKTU MASUK
        $waktuMasuk = Carbon::parse(
            $transaksi->waktu_masuk
        );

        // HITUNG DURASI MENIT
        $durasiMenit = $waktuMasuk
            ->diffInMinutes($waktuKeluar);

        // HITUNG DURASI JAM
        $durasiJam = ceil($durasiMenit / 60);

        // MINIMAL 1 JAM
        if ($durasiJam < 1) {
            $durasiJam = 1;
        }

        // HITUNG BIAYA
        $biayaTotal =
            $durasiJam *
            $transaksi->tarif_per_jam;


        // =================================================
        // UPDATE TRANSAKSI MENJADI KELUAR
        // =================================================
        DB::table('tb_transaksi')
            ->where('id_parkir', $id)
            ->update([
                'waktu_keluar' => $waktuKeluar,
                'durasi_jam' => $durasiJam,
                'biaya_total' => $biayaTotal,
                'status' => 'keluar',
            ]);


        // =================================================
        // OTOMATIS KURANGI TERISI
        // =================================================
        DB::table('tb_area_parkir')
            ->where('id_area', $transaksi->id_area)
            ->where('terisi', '>', 0)
            ->decrement('terisi');


        // =================================================
        // CATAT LOG
        // =================================================
        if (session('id_user')) {
            DB::table('tb_log_aktivitas')->insert([
                'id_user' => session('id_user'),
                'aktivitas' => 'Memproses kendaraan keluar',
                'waktu_aktivitas' => Carbon::now(),
            ]);
        }


        return redirect()
            ->route('petugas.transaksi.index')
            ->with(
                'success',
                'Kendaraan berhasil keluar! Biaya parkir: Rp ' .
                number_format(
                    $biayaTotal,
                    0,
                    ',',
                    '.'
                )
            );
    }
}