<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Log Aktivitas - Parkir Kabasa</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #eef3fa;
            color: #16345C;
        }


        /* =========================
           LAYOUT
        ========================= */

        .layout {
            display: flex;
            min-height: 100vh;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #1E3762;
            padding: 25px 15px;
            color: white;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            margin-bottom: 25px;
        }

        .brand h2 {
            font-size: 20px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            text-decoration: none;
            color: #cbd5e1;
            padding: 13px 15px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .menu a:hover {
            background: #2E4E85;
            color: white;
        }

        .menu a.active {
            background: #2E4E85;
            color: white;
        }

        .logout {
            margin-top: 30px;
            display: block;
            background: #dc2626;
            color: white !important;
            text-align: center;
        }

        .logout:hover {
            background: #b91c1c !important;
        }


        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            flex: 1;
            padding: 40px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 30px;
            color: #16345C;
        }


        /* =========================
           CARD
        ========================= */

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .card h2 {
            margin-bottom: 20px;
            color: #1f2937;
        }


        /* =========================
           TABLE
        ========================= */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #1E4E8C;
            color: white;
            padding: 14px;
            text-align: left;
        }

        table td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
            color: #1f2937;
        }

        table tr:hover {
            background: #f1f6fb;
        }

        .kosong {
            text-align: center;
            padding: 25px;
            color: #6E88A8;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .sidebar {
                width: 200px;
            }

            .main {
                padding: 20px;
            }

            table {
                font-size: 14px;
            }

        }

    </style>

</head>


<body>

<div class="layout">


    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="sidebar">

        <div class="brand">
            🅿️
            <h2>Parkir Kabasa</h2>
        </div>


        <div class="menu">


            <a href="{{ route('admin.dashboard') }}">
                🏠 Dashboard
            </a>


            <a href="{{ route('admin.kendaraan.index') }}">
                🚗 Kendaraan
            </a>


            <a href="{{ route('admin.user.index') }}">
                👥 Data User
            </a>


            <a href="{{ route('admin.area.index') }}">
                🅿️ Area Parkir
            </a>


            <a href="{{ route('admin.tarif.index') }}">
                💰 Tarif Parkir
            </a>


            <!-- MENU AKTIF -->

            <a href="{{ route('admin.log.index') }}"
               class="active">
                📋 Log Aktivitas
            </a>


            <a href="{{ route('logout') }}"
               class="logout">
                🚪 Logout
            </a>


        </div>

    </aside>



    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="main">


        <div class="header">

            <h1>📋 Log Aktivitas</h1>

        </div>


        <div class="card">


            <h2>Riwayat Aktivitas Sistem</h2>


            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Aktivitas</th>
                        <th>Waktu</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($logs as $log)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>
                                {{ $log->nama_lengkap ?? '-' }}
                            </td>


                            <td>
                                {{ $log->username ?? '-' }}
                            </td>


                            <td>
                                {{ $log->aktivitas }}
                            </td>


                            <td>
                                {{ $log->waktu_aktivitas }}
                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="5"
                                class="kosong">

                                📋 Belum ada riwayat aktivitas.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>


        </div>


    </main>


</div>

</body>

</html>