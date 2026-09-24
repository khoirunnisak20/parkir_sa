<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,600;9..144,700&display=swap');

        :root{
            --bg:#f3f7fc;
            --navy:#102957;
            --navy2:#173b78;
            --blue:#3979e8;
            --blue2:#5c95f5;
            --text:#122e59;
            --muted:#8094b2;
            --white:#fff;
            --line:#e7edf6;
            --green:#24ad7d;
            --orange:#f3a43d;
            --purple:#7967e8;
        }

        *{
            box-sizing:border-box;
        }

        html,
        body{
            margin:0;
            min-height:100%;
            font-family:'DM Sans',sans-serif;
            color:var(--text);
            background:
                radial-gradient(
                    circle at 82% 4%,
                    rgba(79,135,232,.13),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #f6f9fd 0%,
                    #edf4fc 100%
                );
        }

        .layout{
            display:flex;
            min-height:100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar{
            width:258px;
            min-width:258px;
            height:100vh;
            position:sticky;
            top:0;
            overflow:hidden;
            padding:25px 17px 20px;
            color:#c8d6ec;

            background:
                radial-gradient(
                    circle at 15% 90%,
                    rgba(69,126,231,.25),
                    transparent 31%
                ),
                radial-gradient(
                    circle at 100% 20%,
                    rgba(71,128,231,.13),
                    transparent 28%
                ),
                linear-gradient(
                    160deg,
                    #0e234b,
                    #17386f 72%,
                    #1a417c
                );

            box-shadow:
                10px 0 35px rgba(16,41,87,.12);

            display:flex;
            flex-direction:column;
        }

        .sidebar:before{
            content:"";
            position:absolute;
            width:180px;
            height:180px;
            border:1px solid rgba(255,255,255,.06);
            border-radius:50%;
            right:-105px;
            top:120px;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:12px;
            padding:3px 9px 25px;
            margin-bottom:17px;
            border-bottom:1px solid rgba(255,255,255,.09);
        }

        .brand-mark{
            width:42px;
            height:42px;
            border-radius:13px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:21px;
            color:#fff;

            background:
                linear-gradient(
                    145deg,
                    #4b8df2,
                    #2d61bd
                );

            box-shadow:
                0 10px 25px rgba(33,91,185,.38);
        }

        .brand-name{
            font-family:'Fraunces',serif;
            font-size:19px;
            font-weight:700;
            color:#fff;
        }

        nav{
            display:flex;
            flex-direction:column;
            gap:8px;
            flex:1;
        }

        .nav-item{
            position:relative;
            display:flex;
            align-items:center;
            gap:12px;
            padding:13px 15px;
            border-radius:13px;
            color:#aebfdc;
            text-decoration:none;
            font-size:13px;
            font-weight:600;
            transition:.22s ease;
        }

        .nav-item:hover{
            color:#fff;
            background:rgba(255,255,255,.08);
            transform:translateX(3px);
        }

        .nav-item.active{
            color:#fff;

            background:
                linear-gradient(
                    100deg,
                    #3975d0,
                    #2d5ba7
                );

            box-shadow:
                0 11px 25px rgba(4,27,67,.25);
        }

        .nav-item.active:after{
            content:"";
            position:absolute;
            right:9px;
            width:5px;
            height:5px;
            border-radius:50%;
            background:#fff;
        }

        .sidebar-foot{
            padding:15px 5px 0;
            border-top:1px solid rgba(255,255,255,.1);
            color:#91a8cc;
            font-size:11px;
            line-height:1.7;
        }

        /* ================= MAIN ================= */

        .main{
            flex:1;
            min-width:0;
            padding:34px 42px 45px;
        }

        /* ================= HEADER ================= */

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .topbar h1{
            margin:0 0 7px;
            font-family:'Fraunces',serif;
            font-size:34px;
            line-height:1.05;
            letter-spacing:-.9px;
            color:#102d58;
        }

        .sub{
            font-size:13px;
            color:var(--muted);
        }

        .profile{
            display:flex;
            align-items:center;
            gap:12px;
            padding:8px 17px 8px 8px;
            border:1px solid #e5ebf4;
            border-radius:17px;
            background:rgba(255,255,255,.94);

            box-shadow:
                0 10px 30px rgba(34,69,116,.09);
        }

        .avatar{
            width:43px;
            height:43px;
            border-radius:13px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#fff;
            font-weight:700;

            background:
                linear-gradient(
                    145deg,
                    #4a8df0,
                    #2d61b6
                );

            box-shadow:
                0 7px 15px rgba(49,108,213,.2);
        }

        .profile-name{
            font-size:13px;
            font-weight:700;
        }

        .profile-role{
            margin-top:2px;
            font-size:11px;
            color:var(--muted);
        }

        /* ================= STATS ================= */

        .stats{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:18px;
            margin-bottom:24px;
        }

        .stat-card{
            position:relative;
            overflow:hidden;
            min-height:170px;
            padding:21px;
            border:1px solid rgba(225,233,244,.9);
            border-radius:20px;
            background:rgba(255,255,255,.98);

            box-shadow:
                0 14px 35px rgba(29,64,110,.075);

            transition:.25s ease;
        }

        .stat-card:hover{
            transform:translateY(-5px);

            box-shadow:
                0 20px 40px rgba(29,64,110,.12);
        }

        .stat-card:before{
            content:"";
            position:absolute;
            width:115px;
            height:115px;
            border-radius:50%;
            right:-53px;
            top:-48px;
            background:rgba(57,121,232,.055);
        }

        .stat-icon{
            width:46px;
            height:46px;
            border-radius:14px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin-bottom:16px;
            font-size:19px;
            position:relative;
            z-index:1;
        }

        .blue{
            background:#e6f0ff;
        }

        .teal{
            background:#e2f8f1;
        }

        .indigo{
            background:#eeeaff;
        }

        .green{
            background:#fff0dc;
        }

        .stat-value{
            font-size:25px;
            font-weight:700;
            letter-spacing:-.5px;
            position:relative;
            z-index:1;
        }

        .stat-label{
            margin-top:6px;
            font-size:12px;
            color:var(--muted);
            position:relative;
            z-index:1;
        }

        .stat-desc{
            margin-top:13px;
            font-size:11px;
            font-weight:700;
            color:var(--green);
            position:relative;
            z-index:1;
        }

        /* ================= CONTENT ================= */

        .content-grid{
            display:grid;
            grid-template-columns:minmax(0,1.72fr) minmax(300px,.9fr);
            gap:20px;
        }

        .panel{
            border:1px solid rgba(225,233,244,.9);
            border-radius:20px;
            padding:22px;
            background:rgba(255,255,255,.98);

            box-shadow:
                0 14px 35px rgba(29,64,110,.07);
        }

        .panel-head{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:15px;
            margin-bottom:18px;
        }

        .panel-head h2{
            margin:0;
            font-size:17px;
            letter-spacing:-.2px;
        }

        .count{
            padding:7px 10px;
            border-radius:9px;
            background:#f3f7fc;
            color:#7188a8;
            font-size:11px;
        }

        /* ================= TABLE ================= */

        .table-wrap{
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:separate;
            border-spacing:0;
        }

        th{
            padding:11px 10px;
            background:#f4f7fb;
            border-bottom:1px solid var(--line);
            color:#7188a8;
            text-align:left;
            font-size:10px;
            font-weight:700;
            text-transform:uppercase;
            letter-spacing:.25px;
        }

        th:first-child{
            border-radius:11px 0 0 11px;
        }

        th:last-child{
            border-radius:0 11px 11px 0;
        }

        td{
            padding:14px 10px;
            border-bottom:1px solid var(--line);
            font-size:12px;
            white-space:nowrap;
        }

        tbody tr{
            transition:.18s;
        }

        tbody tr:hover td{
            background:#f8fbff;
        }

        tr:last-child td{
            border-bottom:0;
        }

        .plat{
            font-weight:700;
            color:#173e73;
        }

        .badge{
            display:inline-flex;
            align-items:center;
            padding:6px 10px;
            border-radius:20px;
            font-size:10px;
            font-weight:700;
        }

        .badge-masuk{
            background:#e5efff;
            color:#4675bd;
        }

        .badge-keluar{
            background:#e3f7ef;
            color:#22966d;
        }

        .btn-rekap{
            display:inline-flex;
            align-items:center;
            padding:9px 13px;
            border-radius:10px;

            background:
                linear-gradient(
                    135deg,
                    #3974c9,
                    #2b5798
                );

            color:#fff;
            text-decoration:none;
            font-size:11px;
            font-weight:700;

            box-shadow:
                0 8px 17px rgba(44,87,152,.2);

            transition:.2s;
        }

        .btn-rekap:hover{
            transform:translateY(-2px);

            box-shadow:
                0 11px 20px rgba(44,87,152,.27);
        }

        .empty{
            text-align:center;
            padding:28px;
            color:var(--muted);
        }

        /* ================= DONUT ================= */

        .donut-wrap{
            display:flex;
            flex-direction:column;
            align-items:center;
            padding:8px 0 4px;
        }

        .donut{
            width:190px;
            height:190px;
            border-radius:50%;

            display:flex;
            align-items:center;
            justify-content:center;

            background:
                conic-gradient(
                    var(--blue) 0% 60%,
                    #e8eef7 60% 100%
                );

            box-shadow:
                0 14px 30px rgba(53,112,204,.1);

            position:relative;
        }

        .donut:before{
            content:"";
            position:absolute;
            inset:7px;
            border-radius:50%;
            background:rgba(255,255,255,.18);
        }

        .donut-center{
            position:relative;
            z-index:1;
            width:134px;
            height:134px;
            border-radius:50%;

            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;

            background:#fff;

            box-shadow:
                inset 0 0 0 1px #edf1f7;
        }

        .pct{
            font-size:29px;
            font-weight:700;
            letter-spacing:-1px;
        }

        .donut-label{
            margin-top:3px;
            font-size:11px;
            color:var(--muted);
        }

        .legend{
            display:flex;
            justify-content:center;
            gap:20px;
            flex-wrap:wrap;
            width:100%;
            margin-top:22px;
            padding-top:17px;
            border-top:1px solid var(--line);
        }

        .legend-item{
            font-size:11px;
            color:#7087a6;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:1200px){

            .main{
                padding:28px 25px 38px;
            }

            .stats{
                grid-template-columns:repeat(2,1fr);
            }

            .content-grid{
                grid-template-columns:1fr;
            }

        }

        @media(max-width:760px){

            .sidebar{
                display:none;
            }

            .main{
                padding:22px 16px 30px;
            }

            .topbar{
                align-items:flex-start;
                flex-direction:column;
                gap:16px;
            }

            .topbar h1{
                font-size:28px;
            }

            .stats{
                grid-template-columns:1fr;
            }

            .stat-card{
                min-height:auto;
            }

            .panel{
                padding:17px;
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
                Parkir Kabasa
            </div>

        </div>


        <nav>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-item active">

                🏠 Dashboard

            </a>


            <a href="{{ route('admin.kendaraan.index') }}"
               class="nav-item">

                🚗 Kendaraan

            </a>


            <a href="{{ route('admin.user.index') }}"
               class="nav-item">

                👤 Data User

            </a>


            <a href="{{ route('admin.area.index') }}"
               class="nav-item">

                🅿️ Area Parkir

            </a>


            <a href="{{ route('admin.tarif.index') }}"
               class="nav-item">

                💰 Tarif Parkir

            </a>


            <a href="{{ route('admin.log.index') }}"
               class="nav-item">

                📋 Log Aktivitas

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
                    Dashboard Admin
                </h1>

                <div class="sub">
                    Ringkasan sistem dan aktivitas parkir
                </div>

            </div>


            <div class="profile">

                <div class="avatar">
                    A
                </div>

                <div>

                    <div class="profile-name">
                        {{ session('username') ?? 'Admin Parkir' }}
                    </div>

                    <div class="profile-role">
                        Administrator
                    </div>

                </div>

            </div>

        </div>



        <!-- ================= STATISTIK ================= -->

        <div class="stats">


            <div class="stat-card">

                <div class="stat-icon blue">
                    🚗
                </div>

                <div class="stat-value">
                    97
                </div>

                <div class="stat-label">
                    Total Transaksi
                </div>

                <div class="stat-desc">
                    Semua transaksi parkir
                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon teal">
                    💰
                </div>

                <div class="stat-value">
                    Rp 486.000
                </div>

                <div class="stat-label">
                    Total Pendapatan
                </div>

                <div class="stat-desc">
                    Dari transaksi selesai
                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon indigo">
                    📅
                </div>

                <div class="stat-value">
                    Rp 486.000
                </div>

                <div class="stat-label">
                    Pendapatan Hari Ini
                </div>

                <div class="stat-desc">
                    Pendapatan hari ini
                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon green">
                    🅿️
                </div>

                <div class="stat-value">
                    24
                </div>

                <div class="stat-label">
                    Sedang Parkir
                </div>

                <div class="stat-desc">
                    Kendaraan masih berada di area
                </div>

            </div>


        </div>



        <!-- ================= CONTENT ================= -->

        <div class="content-grid">


            <!-- ================= TRANSAKSI ================= -->

            <div class="panel">

                <div class="panel-head">

                    <h2>
                        Transaksi Terbaru
                    </h2>

                    <a href="{{ route('admin.kendaraan.index') }}"
                       class="btn-rekap">

                        Lihat Data

                    </a>

                </div>


                <div class="table-wrap">

                    <table>

                        <thead>

                            <tr>

                                <th>Plat Nomor</th>

                                <th>Jenis</th>

                                <th>Area</th>

                                <th>Waktu Masuk</th>

                                <th>Status</th>

                            </tr>

                        </thead>


                        <tbody>


                            <tr>

                                <td class="plat">
                                    B 1234 KAB
                                </td>

                                <td>
                                    Mobil
                                </td>

                                <td>
                                    Area Mobil A
                                </td>

                                <td>
                                    15-09-2026 08:15
                                </td>

                                <td>

                                    <span class="badge badge-masuk">
                                        Masuk
                                    </span>

                                </td>

                            </tr>


                            <tr>

                                <td class="plat">
                                    B 5521 XYA
                                </td>

                                <td>
                                    Motor
                                </td>

                                <td>
                                    Area Motor A
                                </td>

                                <td>
                                    15-09-2026 08:05
                                </td>

                                <td>

                                    <span class="badge badge-masuk">
                                        Masuk
                                    </span>

                                </td>

                            </tr>


                            <tr>

                                <td class="plat">
                                    D 4471 ASA
                                </td>

                                <td>
                                    Mobil
                                </td>

                                <td>
                                    Area Mobil A
                                </td>

                                <td>
                                    15-09-2026 07:48
                                </td>

                                <td>

                                    <span class="badge badge-keluar">
                                        ✓ Keluar
                                    </span>

                                </td>

                            </tr>


                        </tbody>

                    </table>

                </div>

            </div>



            <!-- ================= SLOT ================= -->

            <div class="panel">

                <div class="panel-head">

                    <h2>
                        Ketersediaan Slot
                    </h2>

                    <span class="count">
                        Total 40 Slot
                    </span>

                </div>


                <div class="donut-wrap">


                    <div class="donut">

                        <div class="donut-center">

                            <div class="pct">
                                60%
                            </div>

                            <div class="donut-label">
                                Terisi
                            </div>

                        </div>

                    </div>


                    <div class="legend">

                        <div class="legend-item">
                            🔵 Terisi (24)
                        </div>

                        <div class="legend-item">
                            ⚪ Kosong (16)
                        </div>

                    </div>


                </div>

            </div>


        </div>


    </main>

</div>


</body>
</html>