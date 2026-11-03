<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data User - Parkir Kabasa</title>

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
           MAIN
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
            color: #16345C;
            font-size: 30px;
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

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        /* =========================
           BUTTON TAMBAH
        ========================= */

        .btn-tambah {
            background: #1E4E8C;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-tambah:hover {
            background: #2A5FA3;
        }

        /* =========================
           PESAN BERHASIL
        ========================= */

        .success {
            background: #d1fae5;
            color: #047857;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-message {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
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
            min-width: 650px;
            border-collapse: collapse;
            margin-top: 10px;
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
        }

        table tr:hover {
            background: #f1f6fb;
        }

        /* =========================
           BUTTON EDIT
        ========================= */

        .btn-edit {
            background: #65c2df;
            color: white;
            border: none;
            padding: 8px 13px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            white-space: nowrap;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        /* =========================
           BUTTON HAPUS
        ========================= */

        .btn-hapus {
            background: #dc2626;
            color: white;
            border: none;
            padding: 8px 13px;
            border-radius: 6px;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-hapus:hover {
            background: #b91c1c;
        }

        form {
            display: inline-block;
            margin-left: 5px;
        }

        /* =========================
           KOLOM AKSI
        ========================= */

        .aksi {
            white-space: nowrap;
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

            .top h2 {
                font-size: 18px;
            }

            .btn-tambah {
                font-size: 13px;
                padding: 9px 12px;
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

            <a href="{{ route('admin.user.index') }}"
               class="active">
                👥 Data User
            </a>

            <a href="{{ route('admin.area.index') }}">
                🅿️ Area Parkir
            </a>

            <a href="{{ route('admin.tarif.index') }}">
                💰 Tarif Parkir
            </a>

            <a href="{{ route('admin.log.index') }}">
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
            <h1>👥 Data User</h1>
        </div>

        {{-- PESAN BERHASIL --}}
        @if(session('success'))

            <div class="success">
                ✅ {{ session('success') }}
            </div>

        @endif

        {{-- PESAN ERROR --}}
        @if(session('error'))

            <div class="error-message">
                ❌ {{ session('error') }}
            </div>

        @endif

        <div class="card">

            <div class="top">

                <h2>Daftar User</h2>

                <a href="{{ route('admin.user.create') }}"
                   class="btn-tambah">

                    + Tambah User

                </a>

            </div>

            <div class="table-responsive">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                            <tr>

                                <td>{{ $user->id_user }}</td>

                                <td>{{ $user->nama_lengkap }}</td>

                                <td>{{ $user->username }}</td>

                                <td>{{ ucfirst($user->role) }}</td>

                                <td class="aksi">

                                    {{-- EDIT USER --}}

                                    <a href="{{ route('admin.user.edit', $user->id_user) }}"
                                       class="btn-edit">

                                        ✏ Edit

                                    </a>

                                    {{-- HAPUS USER --}}

                                    <form action="{{ route('admin.user.delete', $user->id_user) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-hapus"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">

                                            🗑 Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="kosong">

                                    👥 Belum ada data user.

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