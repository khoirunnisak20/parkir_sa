<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transaksi Parkir</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        h1 {
            color: #1E4E8C;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-tambah {
            background: #1E4E8C;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-tambah:hover {
            background: #163b6b;
        }

        .success {
            background: #d1fae5;
            color: #047857;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1E4E8C;
            color: white;
            padding: 13px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f8fafc;
        }

        .status-masuk {
            background: #dbeafe;
            color: #1d4ed8;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 13px;
        }

        .status-keluar {
            background: #d1fae5;
            color: #047857;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 13px;
        }

        .btn-keluar {
            background: #dc2626;
            color: white;
            border: none;
            padding: 9px 14px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-keluar:hover {
            background: #b91c1c;
        }

        .btn-kembali {
            display: inline-block;
            margin-bottom: 20px;
            background: #6b7280;
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
        }

        .kosong {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>🚗 Transaksi Parkir</h1>

    <a href="/petugas/dashboard" class="btn-kembali">
        ← Dashboard
    </a>


    @if(session('success'))
        <div class="success">
            ✅ {{ session('success') }}
        </div>
    @endif


    @if(session('error'))
        <div class="error">
            ❌ {{ session('error') }}
        </div>
    @endif


    <div class="card">

        <div class="top">

            <h2>Daftar Transaksi</h2>

            <a href="{{ route('petugas.transaksi.create') }}"
               class="btn-tambah">
                + Kendaraan Masuk
            </a>

        </div>


        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Plat Nomor</th>
                    <th>Jenis</th>
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

                @forelse($transaksis as $transaksi)

                    <tr>

                        <td>{{ $transaksi->id_parkir }}</td>

                        <td>
                            <strong>
                                {{ $transaksi->plat_nomor }}
                            </strong>
                        </td>

                        <td>
                            {{ ucfirst($transaksi->jenis_kendaraan) }}
                        </td>

                        <td>
                            {{ $transaksi->nama_area }}
                        </td>

                        <td>
                            {{ $transaksi->waktu_masuk }}
                        </td>

                        <td>
                            {{ $transaksi->waktu_keluar ?? '-' }}
                        </td>

                        <td>
                            {{ $transaksi->durasi_jam }} Jam
                        </td>

                        <td>
                            Rp {{ number_format($transaksi->biaya_total, 0, ',', '.') }}
                        </td>

                        <td>

                            @if($transaksi->status == 'masuk')

                                <span class="status-masuk">
                                    Masuk
                                </span>

                            @else

                                <span class="status-keluar">
                                    Keluar
                                </span>

                            @endif

                        </td>


                        <td>

                            @if($transaksi->status == 'masuk')

                                <form action="{{ route('petugas.transaksi.keluar', $transaksi->id_parkir) }}"
                                      method="POST">

                                    @csrf
                                    @method('PUT')

                                    <button type="submit"
                                            class="btn-keluar"
                                            onclick="return confirm('Yakin kendaraan akan keluar?')">

                                        🚪 Keluar

                                    </button>

                                </form>

                            @else

                                -

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="10" class="kosong">

                            🚗 Belum ada transaksi parkir.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>