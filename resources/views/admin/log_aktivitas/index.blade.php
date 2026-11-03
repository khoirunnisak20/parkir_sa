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
            min-width: 240px;
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
            min-width: 0;
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
            min-width: 0;
        }

        .card h2 {
            margin-bottom: 20px;
            color: #1f2937;
        }

        /* =========================
           TABLE
        ========================= */

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
        }

        table th {
            background: #1E4E8C;
            color: white;
            padding: 14px;
            text-align: left;
            white-space: nowrap;
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
           RESPONSIVE TABLET
        ========================= */

        @media (max-width: 1000px) {

            .sidebar {
                width: 200px;
                min-width: 200px;
            }

            .main {
                padding: 25px;
            }

            .card {
                padding: 20px;
            }

        }

        /* =========================
           RESPONSIVE LAYAR KECIL
        ========================= */

        @media (max-width: 768px) {

            .sidebar {
                width: 180px;
                min-width: 180px;
                padding: 20px 10px;
            }

            .brand h2 {
                font-size: 17px;
            }

            .menu a {
                padding: 11px 10px;
                font-size: 13px;
            }

            .main {
                padding: 15px;
            }

            .header h1 {
                font-size: 24px;
            }

            .card {
                padding: 15px;
                border-radius: 10px;
            }

            .card h2 {
                font-size: 18px;
            }

        }

        /* =========================
           RESPONSIVE LAYAR SANGAT KECIL
        ========================= */

        @media (max-width: 480px) {

            .sidebar {
                width: 155px;
                min-width: 155px;
                padding: 15px 8px;
            }

            .brand {
                gap: 5px;
                padding: 5px;
            }

            .brand h2 {
                font-size: 15px;
            }

            .main {
                padding: 10px;
            }

            .card {
                padding: 12px;
            }

            .header h1 {
                font-size: 20px;
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

            <div class="table-responsive">

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

        </div>

    </main>

</div>

</body>

</html>