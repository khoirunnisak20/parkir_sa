<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transaksi Parkir</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Inter:wght@400;500;600;700&display=swap');

        :root {
            --page-bg: #EEF3FA;

            --sidebar: #17284A;
            --sidebar-2: #1E3762;
            --sidebar-active: #2E4E85;

            --ink: #16345C;
            --muted: #7189A8;

            --line: #DDE5F0;

            --white: #FFFFFF;

            --blue: #3E6BA8;
            --green: #176B5B;

            --success-bg: #E1F3EA;
            --success-text: #2F7A5F;

            --error-bg: #FDE8E8;
            --error-text: #B94A4A;
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


        /* ================= LAYOUT ================= */

        .layout {
            display: flex;
            min-height: 100vh;
        }


        /* ================= SIDEBAR ================= */

        .sidebar {

            width: 245px;
            min-height: 100vh;

            background: linear-gradient(
                190deg,
                var(--sidebar),
                var(--sidebar-2)
            );

            padding: 24px 12px;

            color: white;
        }


        .brand {

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 0 10px 28px;
        }


        .brand-icon {

            width: 36px;
            height: 36px;

            background: #315486;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: bold;
        }


        .brand-name {

            font-family: 'Fraunces', serif;

            font-size: 19px;
            font-weight: 600;
        }


        nav {

            display: flex;
            flex-direction: column;

            gap: 7px;
        }


        .nav-item {

            text-decoration: none;

            color: #B9C9E2;

            padding: 14px 14px;

            border-radius: 10px;

            font-size: 14px;
            font-weight: 600;
        }


        .nav-item:hover {

            background: rgba(255,255,255,.08);
            color: white;
        }


        .nav-item.active {

            background: #3B5B8B;

            color: white;
        }


        /* ================= MAIN ================= */

        .main {

            flex: 1;

            padding: 30px 40px;

            min-width: 0;
        }


        /* ================= HEADER ================= */

        .topbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;
        }


        .title {

            display: flex;

            align-items: center;

            gap: 15px;
        }


        .title-icon {

            font-size: 28px;
        }


        h1 {

            font-family: 'Fraunces', serif;

            font-size: 29px;

            margin: 0 0 5px;
        }


        .subtitle {

            color: var(--muted);

            font-size: 14px;
        }


        /* ================= PROFILE ================= */

        .profile {

            display: flex;

            align-items: center;

            gap: 12px;

            background: white;

            padding: 10px 18px 10px 10px;

            border-radius: 16px;

            box-shadow:
                0 8px 24px -14px
                rgba(23,40,74,.25);
        }


        .avatar {

            width: 42px;
            height: 42px;

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

            font-weight: 700;
        }


        .profile-role {

            font-size: 12px;

            color: var(--muted);

            margin-top: 3px;
        }


        /* ================= ALERT ================= */

        .alert-success {

            background: var(--success-bg);

            color: var(--success-text);

            padding: 16px 20px;

            border-radius: 12px;

            margin-bottom: 20px;

            font-size: 14px;

            font-weight: 600;

            border-left: 5px solid #4F9C7C;
        }


        .alert-error {

            background: var(--error-bg);

            color: var(--error-text);

            padding: 16px 20px;

            border-radius: 12px;

            margin-bottom: 20px;

            font-size: 14px;

            font-weight: 600;

            border-left: 5px solid #D9534F;
        }


        /* ================= PANEL ================= */

        .panel {

            background: white;

            border-radius: 18px;

            padding: 26px;

            box-shadow:
                0 8px 24px -14px
                rgba(23,40,74,.20);
        }


        .panel-head {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 24px;
        }


        .panel-title {

            font-size: 23px;

            margin: 0;
        }


        /* ================= BUTTON ================= */

        .btn-tambah {

            background: #35577F;

            color: white;

            text-decoration: none;

            padding: 13px 20px;

            border-radius: 9px;

            font-size: 14px;

            font-weight: 700;
        }


        .btn-tambah:hover {

            opacity: .9;
        }


        .btn-keluar {

            background: #405C7C;

            color: white;

            border: none;

            padding: 10px 18px;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;
        }


        .btn-keluar:hover {

            opacity: .85;
        }


        .btn-struk {

            display: inline-block;

            background: #176B5B;

            color: white;

            text-decoration: none;

            padding: 10px 17px;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 700;
        }


        /* ================= TABLE ================= */

        .table-wrap {

            overflow-x: auto;
        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 950px;
        }


        thead {

            background: #3C5E89;

            color: white;
        }


        th {

            padding: 14px 14px;

            text-align: left;

            font-size: 13px;

            font-weight: 700;
        }


        td {

            padding: 14px 14px;

            font-size: 14px;

            border-bottom: 1px solid var(--line);
        }


        tbody tr:hover {

            background: #F7FAFE;
        }


        .plat {

            font-weight: 700;
        }


        /* ================= BADGE ================= */

        .badge {

            display: inline-block;

            padding: 8px 14px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 700;
        }


        .badge-masuk {

            background: #E3ECFB;

            color: #4A72B8;
        }


        .badge-keluar {

            background: #E1F3EA;

            color: #4F9C7C;
        }


        .empty {

            text-align: center;

            padding: 30px;

            color: var(--muted);
        }


        @media(max-width: 900px) {

            .sidebar {
                width: 200px;
            }

            .main {
                padding: 20px;
            }

        }


        @media(max-width: 700px) {

            .sidebar {
                display: none;
            }

            .main {
                padding: 15px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

        }

    </style>

</head>


<body>


<div class="layout">


    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">


        <div class="brand">

            <div class="brand-icon">
                P
            </div>

            <div class="brand-name">
                Parkir Kabasa
            </div>

        </div>


        <nav>


            <a href="{{ route('petugas.dashboard') }}"
               class="nav-item">

                🏠 Dashboard

            </a>


            <a href="{{ route('petugas.transaksi.index') }}"
               class="nav-item active">

                🚗 Transaksi

            </a>


            <a href="{{ route('logout') }}"
               class="nav-item">

                🚪 Logout

            </a>


        </nav>


    </aside>



    <!-- ================= MAIN ================= -->

    <main class="main">


        <!-- ================= HEADER ================= -->

        <div class="topbar">


            <div class="title">

                <div class="title-icon">
                    🚗
                </div>


                <div>

                    <h1>Transaksi Parkir</h1>

                    <div class="subtitle">

                        Kelola kendaraan masuk dan keluar dari area parkir.

                    </div>

                </div>

            </div>



            <!-- PROFILE -->

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



        <!-- ================= PESAN BERHASIL ================= -->

        @if(session('success'))

            <div class="alert-success">

                ✅ {{ session('success') }}

            </div>

        @endif



        <!-- ================= PESAN ERROR ================= -->

        @if(session('error'))

            <div class="alert-error">

                ❌ {{ session('error') }}

            </div>

        @endif



        <!-- ================= PANEL ================= -->

        <div class="panel">


            <div class="panel-head">


                <h2 class="panel-title">

                    Daftar Transaksi

                </h2>


                <a href="{{ route('petugas.transaksi.create') }}"
                   class="btn-tambah">

                    + Kendaraan Masuk

                </a>


            </div>



            <!-- ================= TABLE ================= -->

            <div class="table-wrap">


                <table>


                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Plat Nomor</th>

                            <th>Jenis</th>

                            <th>Pemilik</th>

                            <th>Area Parkir</th>

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

                                {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('Y-m-d H:i:s') }}

                            </td>



                            <!-- WAKTU KELUAR -->

                            <td>

                                @if($item->waktu_keluar)

                                    {{ \Carbon\Carbon::parse($item->waktu_keluar)->format('Y-m-d H:i:s') }}

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


                                @if($item->status == 'masuk')

                                    <span class="badge badge-masuk">

                                        Masuk

                                    </span>

                                @else

                                    <span class="badge badge-keluar">

                                        ✓ Keluar

                                    </span>

                                @endif


                            </td>



                            <!-- AKSI -->

                            <td>


                                @if($item->status == 'masuk')


                                    <!-- TOMBOL KELUAR -->

                                    <form
                                        action="{{ route('petugas.transaksi.keluar', $item->id_parkir) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        @method('PUT')


                                        <button
                                            type="submit"
                                            class="btn-keluar"
                                            onclick="return confirm('Yakin kendaraan ini akan keluar dari parkir?')"
                                        >

                                            Keluar

                                        </button>


                                    </form>


                                @else


                                    <!-- TOMBOL STRUK -->

                                    <a
                                        href="{{ route('petugas.struk.show', $item->id_parkir) }}"
                                        class="btn-struk"
                                    >

                                        🧾 Struk

                                    </a>


                                @endif


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="11"
                                class="empty"
                            >

                                Belum ada transaksi parkir.

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
