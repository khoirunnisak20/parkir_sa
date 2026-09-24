<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaParkirController extends Controller
{
    // =====================================================
    // MENAMPILKAN DATA AREA PARKIR
    // =====================================================
    public function index()
    {
        $areas = DB::table('tb_area_parkir')->get();

        return view(
            'admin.area_parkir.index',
            compact('areas')
        );
    }


    // =====================================================
    // HALAMAN TAMBAH AREA PARKIR
    // =====================================================
    public function create()
    {
        return view('admin.area_parkir.create');
    }


    // =====================================================
    // SIMPAN AREA PARKIR
    // =====================================================
    public function store(Request $request)
    {
        $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required|numeric|min:1',
        ]);

        DB::table('tb_area_parkir')->insert([
            'nama_area' => $request->nama_area,

            // KAPASITAS DITENTUKAN ADMIN
            'kapasitas' => $request->kapasitas,

            // TERISI SELALU DIMULAI DARI 0
            'terisi' => 0,
        ]);

        return redirect()
            ->route('admin.area.index')
            ->with(
                'success',
                'Area parkir berhasil ditambahkan!'
            );
    }


    // =====================================================
    // HALAMAN EDIT AREA PARKIR
    // =====================================================
    public function edit($id)
    {
        $area = DB::table('tb_area_parkir')
            ->where('id_area', $id)
            ->first();

        if (!$area) {
            return redirect()
                ->route('admin.area.index')
                ->with(
                    'error',
                    'Area parkir tidak ditemukan!'
                );
        }

        return view(
            'admin.area_parkir.edit',
            compact('area')
        );
    }


    // =====================================================
    // UPDATE AREA PARKIR
    // =====================================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required|numeric|min:1',
        ]);

        // AMBIL DATA AREA
        $area = DB::table('tb_area_parkir')
            ->where('id_area', $id)
            ->first();

        if (!$area) {
            return redirect()
                ->route('admin.area.index')
                ->with(
                    'error',
                    'Area parkir tidak ditemukan!'
                );
        }

        // KAPASITAS TIDAK BOLEH LEBIH KECIL
        // DARI TERISI SAAT INI
        if ($request->kapasitas < $area->terisi) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kapasitas tidak boleh lebih kecil dari jumlah kendaraan yang sedang terisi!'
                );
        }

        DB::table('tb_area_parkir')
            ->where('id_area', $id)
            ->update([
                'nama_area' => $request->nama_area,
                'kapasitas' => $request->kapasitas,

                // TERISI TIDAK DIUBAH MANUAL
                'terisi' => $area->terisi,
            ]);

        return redirect()
            ->route('admin.area.index')
            ->with(
                'success',
                'Area parkir berhasil diupdate!'
            );
    }


    // =====================================================
    // HAPUS AREA PARKIR
    // =====================================================
    public function destroy($id)
    {
        $adaTransaksi = DB::table('tb_transaksi')
            ->where('id_area', $id)
            ->exists();

        if ($adaTransaksi) {
            return redirect()
                ->route('admin.area.index')
                ->with(
                    'error',
                    'Area parkir tidak bisa dihapus karena sudah memiliki riwayat transaksi!'
                );
        }

        DB::table('tb_area_parkir')
            ->where('id_area', $id)
            ->delete();

        return redirect()
            ->route('admin.area.index')
            ->with(
                'success',
                'Area parkir berhasil dihapus!'
            );
    }
}