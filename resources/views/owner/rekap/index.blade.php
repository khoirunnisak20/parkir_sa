<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Rekap Transaksi - Owner</title>


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Inter:wght@400;500;600;700&display=swap');


        :root {

            --page-bg: #EEF3FA;

            --sidebar: #17284A;
            --sidebar-2: #1E3762;
            --sidebar-active: #2E4E85;

            --ink: #16345C;
            --muted: #7189A8;

            --line: #E4EAF3;

            --white: #FFFFFF;

            --blue: #315B92;

            --green: #087A62;
            --green-soft: #DDF3EB;

            --red: #C84B4B;
            --red-soft: #FCE7E7;

        }


        * {
            box-sizing: border-box;
        }


        html,
        body {

            margin: 0;

            font-family: 'Inter', sans-serif;

            background: var(--page-bg);

            color: var(--ink);

        }


        /* ==============================
           LAYOUT
        ============================== */

        .layout {

            display: flex;

            min-height: 100vh;

        }


        /* ==============================
           SIDEBAR
        ============================== */

        .sidebar {

            width: 240px;

            flex-shrink: 0;

            background: linear-gradient(
                190deg,
                var(--sidebar),
                var(--sidebar-2)
            );

            color: #CBDAEF;

            display: flex;

            flex-direction: column;

            padding: 25px 16px;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 0 8px 28px;

        }


        .brand-mark {

            width: 34px;

            height: 34px;

            border-radius: 9px;

            background: var(--sidebar-active);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;

        }


        .brand-name {

            font-family: 'Fraunces', serif;

            font-size: 17px;

            font-weight: 600;

            color: white;

        }


        nav {

            display: flex;

            flex-direction: column;

            gap: 5px;

            flex: 1;

        }


        .nav-item {

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 12px 14px;

            border-radius: 10px;

            color: #A9BEDA;

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

        }


        .nav-item:hover {

            background: rgba(255,255,255,0.07);

            color: white;

        }


        .nav-item.active {

            background: var(--sidebar-active);

            color: white;

        }


        .sidebar-foot {

            font-size: 12px;

            color: #8FA4C5;

            border-top: 1px solid rgba(255,255,255,0.1);

            padding-top: 15px;

        }


        /* ==============================
           MAIN
        ============================== */

        .main {

            flex: 1;

            padding: 30px 40px;

            min-width: 0;

        }


        /* ==============================
           TOPBAR
        ============================== */

        .topbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 28px;

        }


        .topbar h1 {

            font-family: 'Fraunces', serif;

            font-size: 29px;

            margin: 0 0 5px;

        }


        .sub {

            color: var(--muted);

            font-size: 14px;

        }


        .profile {

            display: flex;

            align-items: center;

            gap: 12px;

            background: white;

            padding: 8px 16px 8px 8px;

            border-radius: 14px;

            box-shadow:
                0 6px 18px -8px
                rgba(23,40,74,.15);

        }


        .avatar {

            width: 40px;

            height: 40px;

            border-radius: 50%;

            background: #3E6BA8;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: bold;

        }


        .profile-name {

            font-size: 14px;

            font-weight: 600;

        }


        .profile-role {

            font-size: 12px;

            color: var(--muted);

        }


        /* ==============================
           STATISTIK
        ============================== */

        .stats {

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 18px;

            margin-bottom: 20px;

        }


        .stat-card {

            background: white;

            border-radius: 16px;

            padding: 22px;

            box-shadow:
                0 8px 24px -14px
                rgba(23,40,74,.18);

        }


        .stat-label {

            font-size: 14px;

            color: var(--muted);

            margin-bottom: 10px;

        }


        .stat-value {

            font-size: 28px;

            font-weight: 700;

        }


        /* ==============================
           ALERT
        ============================== */

        .alert {

            padding: 13px 16px;

            border-radius: 10px;

            margin-bottom: 18px;

            font-size: 14px;

            font-weight: 500;

        }


        .alert-success {

            background: var(--green-soft);

            color: var(--green);

        }


        .alert-error {

            background: var(--red-soft);

            color: var(--red);

        }


        /* ==============================
           PANEL
        ============================== */

        .panel {

            background: white;

            border-radius: 16px;

            padding: 22px;

            box-shadow:
                0 8px 24px -14px
                rgba(23,40,74,.15);

        }


        .panel-head {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;

        }


        .panel-head h2 {

            margin: 0;

            font-size: 20px;

        }


        .count {

            font-size: 13px;

            color: var(--muted);

        }


        /* ==============================
           TABLE
        ============================== */

        .table-wrapper {

            width: 100%;

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 1050px;

        }


        th {

            text-align: left;

            font-size: 12px;

            color: white;

            background: #285890;

            padding: 13px 12px;

            white-space: nowrap;

        }


        td {

            padding: 14px 12px;

            font-size: 13px;

            border-bottom: 1px solid var(--line);

            vertical-align: middle;

        }


        tr:last-child td {

            border-bottom: none;

        }


        .plat {

            font-weight: 600;

        }


        /* ==============================
           STATUS
        ============================== */

        .badge {

            display: inline-block;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 600;

        }


        .badge-keluar {

            background: var(--green-soft);

            color: var(--green);

        }


        .badge-masuk {

            background: #E3ECFB;

            color: #4A72B8;

        }


        /* ==============================
           HAPUS
        ============================== */

        .btn-delete {

            border: none;

            background: var(--red);

            color: white;

            padding: 9px 13px;

            border-radius: 8px;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

        }


        .btn-delete:hover {

            opacity: .85;

        }


        .btn-disabled {

            color: #AAB7C8;

            font-size: 12px;

        }


        /* ==============================
           EMPTY
        ============================== */

        .empty {

            text-align: center;

            padding: 35px;

            color: var(--muted);

        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media(max-width: 900px) {

            .sidebar {

                display: none;

            }

            .main {

                padding: 20px;

            }

            .stats {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>


<div class="layout">


    <!-- ==============================
         SIDEBAR
    ============================== -->

    <aside class="sidebar">


        <div class="brand">

            <div class="brand-mark">
                🅿️
            </div>

            <div class="brand-name">
                Parkir Kabasa
            </div>

        </div>


        <nav>


            <a href="{{ route('owner.dashboard') }}"
               class="nav-item">

                🏠 Dashboard

            </a>


            <a href="{{ route('owner.rekap.index') }}"
               class="nav-item active">

                📊 Rekap Transaksi

            </a>


            <a href="{{ route('logout') }}"
               class="nav-item">

                🚪 Logout

            </a>


        </nav>


        <div class="sidebar-foot">

            Parkir Kabosa v1.0

            <br>

            Sistem Manajemen Parkir

        </div>


    </aside>



    <!-- ==============================
         MAIN
    ============================== -->

    <main class="main">


        <!-- ==============================
             TOPBAR
        ============================== -->

        <div class="topbar">


            <div>

                <h1>
                    Rekap Transaksi
                </h1>

                <div class="sub">
                    Rekap seluruh transaksi parkir
                </div>

            </div>


            <div class="profile">


                <div class="avatar">
                    O
                </div>


                <div>

                    <div class="profile-name">
                        Owner Parkir
                    </div>

                    <div class="profile-role">
                        Owner
                    </div>

                </div>


            </div>


        </div>



        <!-- ==============================
             STATISTIK
        ============================== -->

        <div class="stats">


            <div class="stat-card">

                <div class="stat-label">
                    Total Transaksi
                </div>

                <div class="stat-value">
                    {{ $totalTransaksi }}
                </div>

            </div>



            <div class="stat-card">

                <div class="stat-label">
                    Total Pendapatan
                </div>

                <div class="stat-value">

                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}

                </div>

            </div>


        </div>



        <!-- ==============================
             PESAN BERHASIL
        ============================== -->

        @if(session('success'))

            <div class="alert alert-success">

                ✅ {{ session('success') }}

            </div>

        @endif



        <!-- ==============================
             PESAN ERROR
        ============================== -->

        @if(session('error'))

            <div class="alert alert-error">

                ⚠️ {{ session('error') }}

            </div>

        @endif



        <!-- ==============================
             PANEL TRANSAKSI
        ============================== -->

        <div class="panel">


            <div class="panel-head">


                <h2>
                    Daftar Transaksi
                </h2>


                <span class="count">

                    {{ $totalTransaksi }} transaksi

                </span>


            </div>



            <div class="table-wrapper">


                <table>


                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Plat Nomor</th>

                            <th>Jenis</th>

                            <th>Pemilik</th>

                            <th>Area</th>

                            <th>Waktu Masuk</th>

                            <th>Waktu Keluar</th>

                            <th>Durasi</th>

                            <th>Biaya</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>



                    <tbody>


                    @forelse($transaksi as $item)


                        <tr>


                            <!-- ID -->

                            <td>

                                {{ $item->id_parkir }}

                            </td>



                            <!-- PLAT -->

                            <td class="plat">

                                {{ $item->plat_nomor }}

                            </td>



                            <!-- JENIS -->

                            <td>

                                {{ ucfirst($item->jenis_kendaraan) }}

                            </td>



                            <!-- PEMILIK -->

                            <td>

                                {{ $item->pemilik }}

                            </td>



                            <!-- AREA -->

                            <td>

                                {{ $item->nama_area }}

                            </td>



                            <!-- WAKTU MASUK -->

                            <td>

                                {{ date('Y-m-d H:i:s', strtotime($item->waktu_masuk)) }}

                            </td>



                            <!-- WAKTU KELUAR -->

                            <td>

                                @if($item->waktu_keluar)

                                    {{ date('Y-m-d H:i:s', strtotime($item->waktu_keluar)) }}

                                @else

                                    -

                                @endif

                            </td>



                            <!-- DURASI -->

                            <td>

                                @if($item->durasi_jam)

                                    {{ $item->durasi_jam }} Jam

                                @else

                                    -

                                @endif

                            </td>



                            <!-- BIAYA -->

                            <td>

                                @if($item->biaya_total)

                                    Rp {{ number_format($item->biaya_total, 0, ',', '.') }}

                                @else

                                    -

                                @endif

                            </td>



                            <!-- STATUS -->

                            <td>

                                @if($item->status == 'keluar')

                                    <span class="badge badge-keluar">

                                        ✓ Keluar

                                    </span>

                                @else

                                    <span class="badge badge-masuk">

                                        Masuk

                                    </span>

                                @endif

                            </td>



                            <!-- AKSI -->

                            <td>


                                @if($item->status == 'keluar')


                                    <form
                                        action="{{ route('owner.rekap.destroy', $item->id_parkir) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus transaksi ini? Data yang sudah dihapus tidak dapat dikembalikan.');"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="btn-delete"
                                        >

                                            🗑 Hapus

                                        </button>


                                    </form>


                                @else

                                    <span class="btn-disabled">

                                        Tidak dapat dihapus

                                    </span>

                                @endif


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="11" class="empty">

                                Belum ada data transaksi.

                            </td>

                        </tr>


                    @endforelse


                    </tbody>


                </table>


            </div>


        </div>


    </main>


</div>


</body>

</html>