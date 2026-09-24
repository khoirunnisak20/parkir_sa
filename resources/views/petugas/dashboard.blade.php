<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas</title>


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap');


        /* =====================================================
           VARIABLE
        ===================================================== */

        :root {

            --bg: #eef3fa;

            --navy: #17375f;

            --navy2: #234a80;

            --blue: #3f75c5;

            --blue2: #2f66b3;

            --text: #17375f;

            --muted: #7187a7;

            --white: #ffffff;

            --line: #dfe6ef;

            --green: #36ad7c;

            --green-soft: #e1f4ec;

            --blue-soft: #e3edfb;

            --teal-soft: #e2f3f1;

            --purple-soft: #e9e7f8;

            --orange-soft: #fff0dc;

        }


        /* =====================================================
           RESET
        ===================================================== */

        * {

            box-sizing: border-box;

        }


        html,
        body {

            margin: 0;

            min-height: 100%;

            font-family: 'Inter', sans-serif;

            background: var(--bg);

            color: var(--text);

        }


        /* =====================================================
           LAYOUT
        ===================================================== */

        .layout {

            display: flex;

            min-height: 100vh;

        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            width: 258px;

            min-width: 258px;

            min-height: 100vh;

            background: linear-gradient(
                180deg,
                #172f57 0%,
                #214d86 100%
            );

            color: #dce7f6;

            display: flex;

            flex-direction: column;

            padding: 28px 17px 20px;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 0 9px 25px;

            margin-bottom: 17px;

            border-bottom: 1px solid rgba(255,255,255,.12);

        }


        .brand-mark {

            width: 42px;

            height: 42px;

            border-radius: 11px;

            background: #3975cc;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            font-size: 18px;

            box-shadow: 0 5px 15px rgba(0,0,0,.12);

        }


        .brand-name {

            font-family: 'Fraunces', serif;

            font-size: 18px;

            font-weight: 700;

            color: white;

        }


        nav {

            display: flex;

            flex-direction: column;

            gap: 7px;

            flex: 1;

        }


        .nav-item {

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 13px 16px;

            border-radius: 10px;

            color: #c8d7eb;

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

            transition: .2s ease;

        }


        .nav-item:hover {

            background: rgba(255,255,255,.08);

            color: white;

        }


        .nav-item.active {

            background: #3970c0;

            color: white;

            box-shadow: 0 5px 14px rgba(24,57,102,.18);

        }


        .sidebar-foot {

            font-size: 11px;

            line-height: 1.6;

            color: #9eb4d3;

            border-top: 1px solid rgba(255,255,255,.12);

            padding: 15px 5px 0;

        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            flex: 1;

            min-width: 0;

            padding: 31px 42px 45px;

        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            margin-bottom: 28px;

        }


        .topbar h1 {

            font-family: 'Fraunces', serif;

            font-size: 34px;

            line-height: 1.1;

            margin: 0 0 6px;

            color: #17375f;

            letter-spacing: -.4px;

        }


        .sub {

            color: var(--muted);

            font-size: 13px;

        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .profile {

            display: flex;

            align-items: center;

            gap: 11px;

            background: white;

            padding: 8px 16px 8px 8px;

            border-radius: 15px;

            box-shadow: 0 7px 22px rgba(27,55,91,.08);

        }


        .avatar {

            width: 43px;

            height: 43px;

            border-radius: 50%;

            background: #3975c7;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: 700;

            font-size: 16px;

        }


        .profile-name {

            font-size: 13px;

            font-weight: 700;

            color: #17375f;

        }


        .profile-role {

            font-size: 11px;

            color: var(--muted);

            margin-top: 2px;

        }


        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 19px;

            margin-bottom: 26px;

        }


        .stat-card {

            background: white;

            border-radius: 20px;

            padding: 22px;

            min-height: 170px;

            box-shadow: 0 8px 25px rgba(27,55,91,.07);

            position: relative;

            overflow: hidden;

            transition: .2s ease;

        }


        .stat-card:hover {

            transform: translateY(-3px);

            box-shadow: 0 13px 30px rgba(27,55,91,.10);

        }


        .stat-card::after {

            content: "";

            position: absolute;

            width: 105px;

            height: 105px;

            border-radius: 50%;

            background: #f4f7fc;

            right: -42px;

            top: -38px;

        }


        .stat-icon {

            width: 46px;

            height: 46px;

            border-radius: 12px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 17px;

            font-size: 19px;

            position: relative;

            z-index: 2;

        }


        .blue {

            background: var(--blue-soft);

        }


        .teal {

            background: var(--teal-soft);

        }


        .purple {

            background: var(--purple-soft);

        }


        .orange {

            background: var(--orange-soft);

        }


        .stat-value {

            font-size: 25px;

            font-weight: 700;

            line-height: 1.15;

            color: #17375f;

            position: relative;

            z-index: 2;

        }


        .stat-label {

            font-size: 12px;

            color: var(--muted);

            margin-top: 6px;

            position: relative;

            z-index: 2;

        }


        .stat-desc {

            font-size: 11px;

            color: var(--green);

            font-weight: 600;

            margin-top: 13px;

            position: relative;

            z-index: 2;

        }


        /* =====================================================
           CONTENT GRID
        ===================================================== */

        .content-grid {

            display: grid;

            grid-template-columns:
                minmax(0, 1.72fr)
                minmax(300px, .9fr);

            gap: 20px;

        }


        /* =====================================================
           PANEL
        ===================================================== */

        .panel {

            background: white;

            border-radius: 20px;

            padding: 22px 24px;

            box-shadow: 0 8px 25px rgba(27,55,91,.07);

        }


        .panel-head {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 17px;

            gap: 10px;

        }


        .panel-head h2 {

            margin: 0;

            font-size: 17px;

            color: #17375f;

        }


        .count {

            font-size: 11px;

            color: var(--muted);

            background: #f5f8fc;

            padding: 7px 11px;

            border-radius: 8px;

        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .btn-data {

            background: #3972c2;

            color: white;

            text-decoration: none;

            font-size: 11px;

            font-weight: 600;

            padding: 10px 16px;

            border-radius: 10px;

            box-shadow: 0 6px 14px rgba(57,114,194,.22);

        }


        .btn-data:hover {

            background: #2f64ad;

        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrap {

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

        }


        th {

            text-align: left;

            font-size: 11px;

            font-weight: 500;

            color: #7187a7;

            padding: 11px 10px;

            background: #f4f7fb;

            border-bottom: 1px solid #e0e7ef;

        }


        th:first-child {

            border-radius: 10px 0 0 10px;

        }


        th:last-child {

            border-radius: 0 10px 10px 0;

        }


        td {

            padding: 14px 10px;

            font-size: 12px;

            border-bottom: 1px solid var(--line);

            color: #17375f;

        }


        tr:last-child td {

            border-bottom: none;

        }


        tbody tr:hover td {

            background: #fbfdff;

        }


        .plat {

            font-weight: 700;

        }


        /* =====================================================
           BADGE
        ===================================================== */

        .badge {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 600;

        }


        .badge-masuk {

            background: #e2ecfb;

            color: #3972c2;

        }


        .badge-keluar {

            background: #e0f3eb;

            color: #35a879;

        }


        .empty {

            text-align: center;

            padding: 25px;

            color: var(--muted);

        }


        /* =====================================================
           DONUT
        ===================================================== */

        .donut-wrap {

            display: flex;

            flex-direction: column;

            align-items: center;

            padding-top: 5px;

        }


        .donut {

            width: 190px;

            height: 190px;

            border-radius: 50%;

            background: conic-gradient(

                #4b83df 0% {{ $persentaseTerisi }}%,

                #e8eef6 {{ $persentaseTerisi }}% 100%

            );

            display: flex;

            align-items: center;

            justify-content: center;

            margin-top: 2px;

            box-shadow:
                0 8px 20px rgba(62,107,168,.12);

        }


        .donut-center {

            width: 134px;

            height: 134px;

            background: white;

            border-radius: 50%;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

        }


        .pct {

            font-size: 28px;

            font-weight: 700;

            color: #17375f;

        }


        .donut-label {

            font-size: 11px;

            color: var(--muted);

            margin-top: 3px;

        }


        .legend {

            display: flex;

            justify-content: center;

            gap: 22px;

            flex-wrap: wrap;

            margin-top: 21px;

        }


        .legend-item {

            font-size: 11px;

            color: var(--muted);

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 1200px) {

            .main {

                padding: 28px 30px 40px;

            }

            .stats {

                grid-template-columns: repeat(2, 1fr);

            }

        }


        @media(max-width: 900px) {

            .content-grid {

                grid-template-columns: 1fr;

            }

        }


        @media(max-width: 720px) {

            .sidebar {

                display: none;

            }


            .main {

                padding: 20px;

            }


            .topbar {

                flex-direction: column;

                gap: 15px;

            }


            .topbar h1 {

                font-size: 28px;

            }


            .stats {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>


<div class="layout">


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

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


            <a href="{{ route('petugas.dashboard') }}"
               class="nav-item active">

                🏠 Dashboard

            </a>


            <a href="{{ route('petugas.transaksi.index') }}"
               class="nav-item">

                🚗 Transaksi

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



    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="main">


        <!-- =================================================
             TOPBAR
        ================================================== -->

        <div class="topbar">


            <div>

                <h1>
                    Dashboard Petugas
                </h1>


                <div class="sub">
                    Ringkasan aktivitas parkir hari ini
                </div>

            </div>



            <div class="profile">


                <div class="avatar">

                    P

                </div>


                <div>

                    <div class="profile-name">

                        {{ session('username') ?? 'Petugas Parkir' }}

                    </div>


                    <div class="profile-role">

                        Petugas

                    </div>

                </div>


            </div>


        </div>



        <!-- =================================================
             STATISTIK
        ================================================== -->

        <div class="stats">


            <!-- SEDANG PARKIR -->

            <div class="stat-card">


                <div class="stat-icon blue">

                    🚗

                </div>


                <div class="stat-value">

                    {{ $sedangParkir }}

                </div>


                <div class="stat-label">

                    Sedang Parkir

                </div>


                <div class="stat-desc">

                    Kendaraan masih berada di area

                </div>


            </div>



            <!-- TOTAL HARI INI -->

            <div class="stat-card">


                <div class="stat-icon teal">

                    📅

                </div>


                <div class="stat-value">

                    {{ $totalHariIni }}

                </div>


                <div class="stat-label">

                    Total Hari Ini

                </div>


                <div class="stat-desc">

                    Total kendaraan masuk hari ini

                </div>


            </div>



            <!-- PENDAPATAN -->

            <div class="stat-card">


                <div class="stat-icon purple">

                    💰

                </div>


                <div class="stat-value">

                    Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}

                </div>


                <div class="stat-label">

                    Pendapatan Hari Ini

                </div>


                <div class="stat-desc">

                    Dari kendaraan yang sudah keluar

                </div>


            </div>



            <!-- RATA-RATA DURASI -->

            <div class="stat-card">


                <div class="stat-icon orange">

                    ⏱️

                </div>


                <div class="stat-value">

                    {{ $rataDurasiFormat }}

                </div>


                <div class="stat-label">

                    Rata-rata Durasi

                </div>


                <div class="stat-desc">

                    Berdasarkan transaksi selesai

                </div>


            </div>


        </div>



        <!-- =================================================
             CONTENT
        ================================================== -->

        <div class="content-grid">


            <!-- =================================================
                 TRANSAKSI TERBARU
            ================================================== -->

            <div class="panel">


                <div class="panel-head">


                    <h2>

                        Kendaraan Masuk Terbaru

                    </h2>


                    <span class="count">

                        6 transaksi terakhir

                    </span>


                </div>



                <div class="table-wrap">


                    <table>


                        <thead>

                            <tr>

                                <th>
                                    Plat Nomor
                                </th>

                                <th>
                                    Jenis
                                </th>

                                <th>
                                    Jam Masuk
                                </th>

                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                        @forelse($kendaraanTerbaru as $transaksi)


                            <tr>


                                <td class="plat">

                                    {{ $transaksi->plat_nomor }}

                                </td>


                                <td>

                                    {{ ucfirst($transaksi->jenis_kendaraan) }}

                                </td>


                                <td>

                                    {{ date('H:i', strtotime($transaksi->waktu_masuk)) }}

                                </td>


                                <td>


                                    @if($transaksi->status == 'masuk')


                                        <span class="badge badge-masuk">

                                            Masuk

                                        </span>


                                    @else


                                        <span class="badge badge-keluar">

                                            ✓ Keluar

                                        </span>


                                    @endif


                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td colspan="4"
                                    class="empty">

                                    Belum ada transaksi.

                                </td>

                            </tr>


                        @endforelse


                        </tbody>


                    </table>


                </div>


            </div>



            <!-- =================================================
                 SLOT PARKIR
            ================================================== -->

            <div class="panel">


                <div class="panel-head">


                    <h2>

                        Ketersediaan Slot

                    </h2>


                    <span class="count">

                        Total {{ $totalSlot }} Slot

                    </span>


                </div>



                <div class="donut-wrap">


                    <div class="donut">


                        <div class="donut-center">


                            <div class="pct">

                                {{ $persentaseTerisi }}%

                            </div>


                            <div class="donut-label">

                                Terisi

                            </div>


                        </div>


                    </div>



                    <div class="legend">


                        <div class="legend-item">

                            🔵 Terisi
                            ({{ $slotTerisi }})

                        </div>


                        <div class="legend-item">

                            ⚪ Kosong
                            ({{ $slotKosong }})

                        </div>


                    </div>


                </div>


            </div>


        </div>


    </main>


</div>


</body>

</html>