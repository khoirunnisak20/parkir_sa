<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LogAktivitasController extends Controller
{
    public function index()
    {
        $logs = DB::table('tb_log_aktivitas')
            ->leftJoin('tb_user', 'tb_log_aktivitas.id_user', '=', 'tb_user.id_user')
            ->select(
                'tb_log_aktivitas.*',
                'tb_user.nama_lengkap',
                'tb_user.username'
            )
            ->orderBy('tb_log_aktivitas.id_log', 'desc')
            ->get();

        return view('admin.log_aktivitas.index', compact('logs'));
    }
}