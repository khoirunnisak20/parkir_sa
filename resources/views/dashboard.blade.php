<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas</title>

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

            --blue: #3E6BA8;
            --blue-soft: #DCEBFA;

            --teal: #4F9C9C;
            --teal-soft: #DDF0EE;

            --indigo: #6A6FB0;
            --indigo-soft: #E6E5F6;

            --slate: #6E88A8;
            --slate-soft: #E8EEF6;

            --ok: #4F9C7C;
            --ok-soft: #E1F3EA;

            --pend: #4A72B8;
            --pend-soft: #E3ECFB;

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


        .layout {

            display: flex;

            min-height: 100vh;

        }


        /* ================= SIDEBAR ================= */

        .sidebar {

            width: 250px;

            flex-shrink: 0;

            background: linear-gradient(
                190deg,
                var(--sidebar),
                var(--sidebar-2)
            );

            color: #CBDAEF;

            display: flex;

            flex-direction: column;

            padding: 26px 18px;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 0 8px 26px;

            margin-bottom: 10px;

        }


        .brand-mark {

            width: 34px;

            height: 34px;

            border-radius: 9px;

            background: var(--sidebar-active);

            display: flex;

            align-items: center;

            justify-content: center;

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

            gap: 12px;

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


        /* ================= MAIN ================= */

        .main {

            flex: 1;

            padding: 32px 40px;

            min-width: 0;

        }


        .topbar {

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            margin-bottom: 28px;

        }


        .topbar h1 {

            font-family: 'Fraunces', serif;

            font-size: 28px;

            margin: 0 0 6px;

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

            background: var(--blue);

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


        /* ================= STATISTIK ================= */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 26px;

        }


        .stat-card {

            background: white;

            border-radius: 16px;

            padding: 20px;

            box-shadow:
                0 8px 24px -14px
                rgba(23,40,74,.18);

        }


        .stat-icon {

            width: 40px;

            height: 40px;

            border-radius: 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 15px;

            font-size: 19px;

        }


        .blue {
            background: var(--blue-soft);
        }

        .teal {
            background: var(--teal-soft);
        }

        .indigo {
            background: var(--indigo-soft);
        }

        .slate {
            background: var(--slate-soft);
        }


        .stat-value {

            font-size: 27px;

            font-weight: 700;

        }


        .stat-label {

            font-size: 13px;

            color: var(--muted);

            margin-top: 4px;

        }


        .stat-trend {

            font-size: 12px;

            color: var(--ok);

            font-weight: 600;

            margin-top: 14px;

        }


        /* ================= CONTENT ================= */

        .content-grid {

            display: grid;

            grid-template-columns:
                1.7fr 1fr;

            gap: 20px;

        }


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

            margin-bottom: 18px;

        }


        .panel-head h2 {

            margin: 0;

            font-size: 16px;

        }


        .count {

            font-size: 12px;

            color: var(--muted);

        }


        /* ================= TABLE ================= */

        table {

            width: 100%;

            border-collapse: collapse;

        }


        th {

            text-align: left;

            font-size: 12px;

            color: var(--muted);

            padding: 10px;

            border-bottom:
                1px solid var(--line);

        }


        td {

            padding: 13px 10px;

            font-size: 13px;

            border-bottom:
                1px solid var(--line);

        }


        tr:last-child td {

            border-bottom: none;

        }


        .plat {

            font-weight: 600;

        }


        .badge {

            padding: 5px 11px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 600;

        }


        .badge.parkir {

            background: var(--pend-soft);

            color: var(--pend);

        }


        .badge.selesai {

            background: var(--ok-soft);

            color: var(--ok);

        }


        /* ================= DONUT ================= */

        .donut-wrap {

            display: flex;

            flex-direction: column;

            align-items: center;

            padding-top: 10px;

        }


        .donut {

            width: 170px;

            height: 170px;

            border-radius: 50%;

            background:

                conic-gradient(

                    var(--blue)
                    0%
                    {{ $persentaseTerisi }}%,

                    var(--slate-soft)
                    {{ $persentaseTerisi }}%
                    100%

                );

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .donut-center {

            width: 122px;

            height: 122px;

            background: white;

            border-radius: 50%;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

        }


        .pct {

            font-size: 25px;

            font-weight: bold;

        }


        .donut-label {

            font-size: 12px;

            color: var(--muted);

        }


        .legend {

            display: flex;

            gap: 20px;

            margin-top: 20px;

        }


        .legend-item {

            font-size: 13px;

            color: var(--muted);

        }


        /* ================= RESPONSIVE ================= */

        @media(max-width: 1100px) {

            .stats {

                grid-template-columns:
                    repeat(2,1fr);

            }

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

            .stats {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>


<div class="layout">


    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-mark">
                🅿️
            </div>

            <div class="brand-name">
                Parkir Kabosa
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



    <!-- ================= MAIN ================= -->

    <main class="main">


        <!-- ================= HEADER ================= -->

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

                        Petugas Parkir

                    </div>


                    <div class="profile-role">

                        Petugas

                    </div>

                </div>

            </div>

        </div>



        <!-- ================= STATISTIK ================= -->

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


                <div class="stat-trend">

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


                <div class="stat-trend">

                    Total kendaraan masuk hari ini

                </div>

            </div>



            <!-- PENDAPATAN -->

            <div class="stat-card">

                <div class="stat-icon indigo">
                    💰
                </div>


                <div class="stat-value">

                    Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}

                </div>


                <div class="stat-label">

                    Pendapatan Hari Ini

                </div>


                <div class="stat-trend">

                    Dari kendaraan yang sudah keluar

                </div>

            </div>



            <!-- RATA DURASI -->

            <div class="stat-card">

                <div class="stat-icon slate">
                    ⏱️
                </div>


                <div class="stat-value">

                    {{ $rataDurasiFormat }}

                </div>


                <div class="stat-label">

                    Rata-rata Durasi

                </div>


                <div class="stat-trend">

                    Berdasarkan transaksi selesai hari ini

                </div>

            </div>


        </div>



        <!-- ================= CONTENT ================= -->

        <div class="content-grid">


            <!-- ================= KENDARAAN TERBARU ================= -->

            <div class="panel">


                <div class="panel-head">

                    <h2>

                        Kendaraan Masuk Terbaru

                    </h2>


                    <span class="count">

                        6 transaksi terakhir

                    </span>

                </div>



                <table>


                    <thead>

                        <tr>

                            <th>Plat Nomor</th>

                            <th>Jenis</th>

                            <th>Jam Masuk</th>

                            <th>Status</th>

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

                                    <span class="badge parkir">

                                        Parkir

                                    </span>

                                @else

                                    <span class="badge selesai">

                                        Selesai

                                    </span>

                                @endif


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="4"
                                style="text-align:center; padding:25px; color:#7189A8;">

                                Belum ada transaksi.

                            </td>

                        </tr>


                    @endforelse


                    </tbody>


                </table>


            </div>



            <!-- ================= SLOT PARKIR ================= -->

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

                            🔵 Terisi ({{ $slotTerisi }})

                        </div>


                        <div class="legend-item">

                            ⚪ Kosong ({{ $slotKosong }})

                        </div>


                    </div>


                </div>


            </div>


        </div>


    </main>


</div>


</body>

</html>