<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AreaParkirController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\LogAktivitasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StrukController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\PetugasDashboardController;
use App\Http\Controllers\OwnerDashboardController;


// =====================================================
// HALAMAN AWAL
// =====================================================

Route::get('/', function () {
    return redirect()->route('login');
});


// =====================================================
// LOGIN
// =====================================================

// Halaman login
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.proses');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');


// =====================================================
// ADMIN
// =====================================================

Route::middleware('role:admin')->group(function () {

    // =========================
    // DASHBOARD ADMIN
    // =========================

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    // =========================
    // CRUD USER
    // =========================

    Route::get('/admin/user', [UserController::class, 'index'])
        ->name('admin.user.index');

    Route::get('/admin/user/tambah', [UserController::class, 'create'])
        ->name('admin.user.create');

    Route::post('/admin/user/tambah', [UserController::class, 'store'])
        ->name('admin.user.store');

    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])
        ->name('admin.user.edit');

    Route::put('/admin/user/update/{id}', [UserController::class, 'update'])
        ->name('admin.user.update');

    Route::delete('/admin/user/hapus/{id}', [UserController::class, 'destroy'])
        ->name('admin.user.delete');


    // =========================
    // CRUD KENDARAAN
    // =========================

    Route::get('/admin/kendaraan', [KendaraanController::class, 'index'])
        ->name('admin.kendaraan.index');

    Route::get('/admin/kendaraan/tambah', [KendaraanController::class, 'create'])
        ->name('admin.kendaraan.create');

    Route::post('/admin/kendaraan/tambah', [KendaraanController::class, 'store'])
        ->name('admin.kendaraan.store');

    Route::get('/admin/kendaraan/edit/{id}', [KendaraanController::class, 'edit'])
        ->name('admin.kendaraan.edit');

    Route::put('/admin/kendaraan/update/{id}', [KendaraanController::class, 'update'])
        ->name('admin.kendaraan.update');

    Route::delete('/admin/kendaraan/hapus/{id}', [KendaraanController::class, 'destroy'])
        ->name('admin.kendaraan.delete');


    // =========================
    // CRUD AREA PARKIR
    // =========================

    Route::get('/admin/area-parkir', [AreaParkirController::class, 'index'])
        ->name('admin.area.index');

    Route::get('/admin/area-parkir/tambah', [AreaParkirController::class, 'create'])
        ->name('admin.area.create');

    Route::post('/admin/area-parkir/tambah', [AreaParkirController::class, 'store'])
        ->name('admin.area.store');

    Route::get('/admin/area-parkir/edit/{id}', [AreaParkirController::class, 'edit'])
        ->name('admin.area.edit');

    Route::put('/admin/area-parkir/update/{id}', [AreaParkirController::class, 'update'])
        ->name('admin.area.update');

    Route::delete('/admin/area-parkir/hapus/{id}', [AreaParkirController::class, 'destroy'])
        ->name('admin.area.delete');


    // =========================
    // CRUD TARIF
    // =========================

    Route::get('/admin/tarif', [TarifController::class, 'index'])
        ->name('admin.tarif.index');

    Route::get('/admin/tarif/tambah', [TarifController::class, 'create'])
        ->name('admin.tarif.create');

    Route::post('/admin/tarif/tambah', [TarifController::class, 'store'])
        ->name('admin.tarif.store');

    Route::get('/admin/tarif/edit/{id}', [TarifController::class, 'edit'])
        ->name('admin.tarif.edit');

    Route::put('/admin/tarif/update/{id}', [TarifController::class, 'update'])
        ->name('admin.tarif.update');

    Route::delete('/admin/tarif/hapus/{id}', [TarifController::class, 'destroy'])
        ->name('admin.tarif.delete');


    // =========================
    // LOG AKTIVITAS
    // =========================

    Route::get('/admin/log-aktivitas', [LogAktivitasController::class, 'index'])
        ->name('admin.log.index');

});


// =====================================================
// PETUGAS
// =====================================================

Route::middleware('role:petugas')->group(function () {

    // =========================
    // DASHBOARD PETUGAS
    // =========================

    Route::get('/petugas/dashboard', [PetugasDashboardController::class, 'index'])
        ->name('petugas.dashboard');


    // =========================
    // TRANSAKSI PARKIR
    // =========================

    Route::get('/petugas/transaksi', [TransaksiController::class, 'index'])
        ->name('petugas.transaksi.index');

    Route::get('/petugas/transaksi/tambah', [TransaksiController::class, 'create'])
        ->name('petugas.transaksi.create');

    Route::post('/petugas/transaksi/tambah', [TransaksiController::class, 'store'])
        ->name('petugas.transaksi.store');

    Route::put('/petugas/transaksi/keluar/{id}', [TransaksiController::class, 'keluar'])
        ->name('petugas.transaksi.keluar');

    Route::delete(
    '/petugas/transaksi/{id}',
    [TransaksiController::class, 'destroy']
)->name('petugas.transaksi.destroy');

    // =========================
    // STRUK PARKIR
    // =========================

    Route::get('/petugas/struk/{id}', [StrukController::class, 'show'])
        ->name('petugas.struk.show');

    Route::get('/petugas/struk/{id}/cetak', [StrukController::class, 'cetak'])
        ->name('petugas.struk.cetak');

});


// =====================================================
// OWNER
// =====================================================

Route::middleware('role:owner')->group(function () {

    // =========================
    // DASHBOARD OWNER
    // =========================

    Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])
        ->name('owner.dashboard');


    // =========================
    // REKAP TRANSAKSI
    // =========================

    Route::get('/owner/rekap', [RekapController::class, 'index'])
        ->name('owner.rekap.index');


    // =========================
    // HAPUS TRANSAKSI
    // =========================

    Route::delete('/owner/rekap/{id}', [RekapController::class, 'destroy'])
        ->name('owner.rekap.destroy');

});