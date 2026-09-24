<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kendaraan Masuk</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap');


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
            --blue-dark: #315B93;
            --blue-soft: #DCEBFA;

            --teal: #4F9C9C;
            --teal-soft: #DDF0EE;

            --red: #B91C1C;
            --red-soft: #FEE2E2;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html,
        body {
            min-height: 100%;
        }


        body {
            font-family: 'Inter', sans-serif;

            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(62,107,168,.13),
                    transparent 27%
                ),
                radial-gradient(
                    circle at 90% 20%,
                    rgba(79,156,156,.10),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 85% 90%,
                    rgba(106,111,176,.10),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #EEF3FA 0%,
                    #F5F8FC 50%,
                    #EAF1FA 100%
                );

            color: var(--ink);
            overflow-x: hidden;
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
            width: 250px;
            min-width: 250px;

            background:
                linear-gradient(
                    190deg,
                    var(--sidebar),
                    var(--sidebar-2)
                );

            color: #CBDAEF;

            display: flex;
            flex-direction: column;

            padding: 26px 18px;

            min-height: 100vh;
        }


        .brand {
            display: flex;
            align-items: center;

            gap: 11px;

            padding: 0 8px 26px;

            margin-bottom: 10px;

            border-bottom: 1px solid rgba(255,255,255,.10);
        }


        .brand-mark {
            width: 34px;
            height: 34px;

            border-radius: 9px;

            background: var(--sidebar-active);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 17px;
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

            margin-top: 10px;
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

            transition: all .2s ease;
        }


        .nav-item:hover {
            background: rgba(255,255,255,.07);

            color: white;

            transform: translateX(2px);
        }


        .nav-item.active {
            background: var(--sidebar-active);

            color: white;

            box-shadow:
                0 7px 18px rgba(10,30,60,.15);
        }


        .sidebar-foot {
            font-size: 12px;

            color: #8FA4C5;

            border-top: 1px solid rgba(255,255,255,.10);

            padding-top: 15px;

            line-height: 1.5;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            flex: 1;

            min-width: 0;

            padding: 34px 42px 45px;

            display: flex;

            justify-content: center;

            align-items: flex-start;
        }


        .content {
            width: 100%;

            max-width: 760px;

            margin-top: 12px;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            display: flex;

            align-items: center;

            gap: 15px;

            margin-bottom: 20px;
        }


        .back-top {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: white;

            color: var(--blue);

            border-radius: 12px;

            text-decoration: none;

            font-size: 19px;

            box-shadow:
                0 7px 20px rgba(23,40,74,.09);

            transition: all .2s ease;
        }


        .back-top:hover {
            background: var(--blue);

            color: white;

            transform: translateX(-2px);
        }


        .top-title {
            flex: 1;
        }


        .top-title h2 {
            font-family: 'Fraunces', serif;

            font-size: 14px;

            color: var(--muted);

            font-weight: 500;

            margin-bottom: 3px;
        }


        .top-title span {
            font-size: 12px;

            color: var(--muted);
        }


        /* =====================================================
           FORM CARD
        ===================================================== */

        .card {
            background: rgba(255,255,255,.97);

            padding: 34px 36px 36px;

            border-radius: 22px;

            box-shadow:
                0 18px 45px rgba(23,40,74,.11);

            border: 1px solid rgba(255,255,255,.8);
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .page-header {
            margin-bottom: 28px;
        }


        .title-row {
            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 8px;
        }


        .title-icon {
            width: 48px;
            height: 48px;

            border-radius: 13px;

            background: var(--blue-soft);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;

            flex-shrink: 0;
        }


        h1 {
            font-family: 'Fraunces', serif;

            font-size: 32px;

            line-height: 1.1;

            color: var(--ink);

            letter-spacing: -.3px;
        }


        .subtitle {
            color: var(--muted);

            font-size: 13px;

            line-height: 1.6;

            margin-left: 61px;
        }


        /* =====================================================
           ERROR
        ===================================================== */

        .error {
            background: var(--red-soft);

            color: var(--red);

            padding: 15px 17px;

            border-radius: 12px;

            margin-bottom: 22px;

            border: 1px solid #FECACA;

            font-size: 13px;
        }


        .error strong {
            font-size: 13px;
        }


        .error ul {
            margin-left: 20px;

            margin-top: 9px;
        }


        .error li {
            margin-bottom: 4px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {
            margin-bottom: 21px;
        }


        label {
            display: block;

            font-size: 13px;

            font-weight: 700;

            color: var(--ink);

            margin-bottom: 9px;
        }


        select {
            width: 100%;

            height: 49px;

            padding: 0 14px;

            border: 1px solid #CDD7E4;

            border-radius: 11px;

            background: #FBFCFE;

            color: var(--ink);

            font-family: 'Inter', sans-serif;

            font-size: 13px;

            cursor: pointer;

            transition: all .2s ease;
        }


        select:hover {
            border-color: #9FB2CA;

            background: #FFFFFF;
        }


        select:focus {
            outline: none;

            border-color: var(--blue);

            background: #FFFFFF;

            box-shadow:
                0 0 0 4px rgba(62,107,168,.10);
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .button-group {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-top: 28px;
        }


        .btn-simpan,
        .btn-kembali {
            height: 46px;

            border-radius: 10px;

            padding: 0 20px;

            font-family: 'Inter', sans-serif;

            font-size: 13px;

            font-weight: 700;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            transition: all .2s ease;
        }


        .btn-simpan {
            background: var(--blue);

            color: white;

            border: none;

            cursor: pointer;

            box-shadow:
                0 7px 16px rgba(62,107,168,.20);
        }


        .btn-simpan:hover {
            background: var(--blue-dark);

            transform: translateY(-1px);

            box-shadow:
                0 9px 19px rgba(62,107,168,.25);
        }


        .btn-simpan:active {
            transform: translateY(0);
        }


        .btn-kembali {
            background: #687C98;

            color: white;

            text-decoration: none;

            box-shadow:
                0 5px 12px rgba(63,80,104,.12);
        }


        .btn-kembali:hover {
            background: #536983;

            transform: translateY(-1px);
        }


        /* =====================================================
           INFO
        ===================================================== */

        .form-info {
            margin-top: 24px;

            padding-top: 17px;

            border-top: 1px solid var(--line);

            color: var(--muted);

            font-size: 11px;

            line-height: 1.6;
        }


        /* =====================================================
           DECORATION BACKGROUND
        ===================================================== */

        .decoration {
            position: fixed;

            pointer-events: none;

            z-index: 0;
        }


        .circle-one {
            width: 260px;
            height: 260px;

            border: 1px solid rgba(62,107,168,.08);

            border-radius: 50%;

            right: -80px;
            top: 100px;
        }


        .circle-two {
            width: 180px;
            height: 180px;

            border: 1px solid rgba(79,156,156,.08);

            border-radius: 50%;

            left: 280px;
            bottom: -70px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 1000px) {

            .sidebar {
                width: 225px;
                min-width: 225px;
            }

            .main {
                padding: 30px;
            }

        }


        @media(max-width: 760px) {

            .sidebar {
                display: none;
            }

            .main {
                padding: 22px 16px 30px;
            }

            .content {
                max-width: 100%;
            }

            .card {
                padding: 27px 21px 28px;
            }

            h1 {
                font-size: 28px;
            }

            .subtitle {
                margin-left: 0;
            }

        }


        @media(max-width: 500px) {

            .button-group {
                flex-direction: column;

                align-items: stretch;
            }

            .btn-simpan,
            .btn-kembali {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<div class="layout">


    <!-- =====================================================
         SIDEBAR PETUGAS
    ===================================================== -->

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
               class="nav-item">

                🏠
                Dashboard

            </a>


            <a href="{{ route('petugas.transaksi.index') }}"
               class="nav-item active">

                🚗
                Transaksi

            </a>


            <a href="{{ route('logout') }}"
               class="nav-item">

                🚪
                Logout

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


        <div class="content">


            <!-- TOPBAR -->

            <div class="topbar">

                <a href="{{ route('petugas.transaksi.index') }}"
                   class="back-top">

                    ←

                </a>


                <div class="top-title">

                    <h2>
                        Transaksi Parkir
                    </h2>

                    <span>
                        Tambah transaksi kendaraan masuk
                    </span>

                </div>

            </div>



            <!-- FORM CARD -->

            <div class="card">


                <!-- HEADER -->

                <div class="page-header">

                    <div class="title-row">

                        <div class="title-icon">
                            🚗
                        </div>

                        <h1>
                            Kendaraan Masuk
                        </h1>

                    </div>


                    <p class="subtitle">

                        Tambahkan transaksi kendaraan yang masuk
                        ke area parkir.

                    </p>

                </div>



                <!-- ERROR -->

                @if($errors->any())

                    <div class="error">

                        <strong>
                            Terjadi kesalahan:
                        </strong>


                        <ul>

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                <!-- FORM -->

                <form action="{{ route('petugas.transaksi.store') }}"
                      method="POST">

                    @csrf



                    <!-- PILIH KENDARAAN -->

                    <div class="form-group">

                        <label>
                            Pilih Kendaraan
                        </label>


                        <select name="id_kendaraan" required>

                            <option value="">
                                -- Pilih Kendaraan --
                            </option>


                            @foreach($kendaraans as $kendaraan)

                                <option value="{{ $kendaraan->id_kendaraan }}">

                                    {{ $kendaraan->plat_nomor }}

                                    -

                                    {{ ucfirst($kendaraan->jenis_kendaraan) }}

                                    -

                                    {{ $kendaraan->pemilik }}

                                </option>

                            @endforeach

                        </select>

                    </div>



                    <!-- AREA PARKIR -->

                    <div class="form-group">

                        <label>
                            Area Parkir
                        </label>


                        <select name="id_area" required>

                            <option value="">
                                -- Pilih Area Parkir --
                            </option>


                            @foreach($areas as $area)

                                <option value="{{ $area->id_area }}">

                                    {{ $area->nama_area }}

                                    (Kapasitas:
                                    {{ $area->kapasitas }})

                                </option>

                            @endforeach

                        </select>

                    </div>



                    <!-- TARIF PARKIR -->

                    <div class="form-group">

                        <label>
                            Tarif Parkir
                        </label>


                        <select name="id_tarif" required>

                            <option value="">
                                -- Pilih Tarif --
                            </option>


                            @foreach($tarifs as $tarif)

                                <option value="{{ $tarif->id_tarif }}">

                                    {{ ucfirst($tarif->jenis_kendaraan) }}

                                    -

                                    Rp
                                    {{ number_format($tarif->tarif_per_jam, 0, ',', '.') }}

                                    / Jam

                                </option>

                            @endforeach

                        </select>

                    </div>



                    <!-- BUTTON -->

                    <div class="button-group">


                        <button type="submit"
                                class="btn-simpan">

                            💾
                            Simpan Transaksi

                        </button>



                        <a href="{{ route('petugas.transaksi.index') }}"
                           class="btn-kembali">

                            ←
                            Kembali

                        </a>


                    </div>


                </form>



                <!-- INFO -->

                <div class="form-info">

                    Pastikan kendaraan, area parkir, dan tarif
                    yang dipilih sudah sesuai sebelum menyimpan
                    transaksi.

                </div>


            </div>

        </div>

    </main>

</div>



<!-- BACKGROUND DECORATION -->

<div class="decoration circle-one"></div>

<div class="decoration circle-two"></div>


</body>

</html>