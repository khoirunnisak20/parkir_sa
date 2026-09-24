<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Struk Parkir</title>

    <style>

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            padding: 40px;
        }

        .struk {
            width: 400px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            border-bottom: 2px dashed #999;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #1E4E8C;
            margin-bottom: 5px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            gap: 15px;
        }

        .label {
            color: #666;
        }

        .value {
            font-weight: bold;
            text-align: right;
        }

        .total {
            border-top: 2px dashed #999;
            margin-top: 20px;
            padding-top: 15px;
            font-size: 18px;
        }

        .total .value {
            color: #047857;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 15px;
            border-top: 2px dashed #999;
            color: #666;
            font-size: 13px;
        }

        .buttons {
            width: 400px;
            margin: 20px auto;
            text-align: center;
        }

        .btn-cetak {
            background: #1E4E8C;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-kembali {
            display: inline-block;
            background: #6b7280;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            margin-left: 10px;
        }

        @media print {

            body {
                background: white;
                padding: 0;
            }

            .buttons {
                display: none;
            }

            .struk {
                box-shadow: none;
                width: 100%;
            }

        }

    </style>

</head>

<body>

<div class="struk">

    <div class="header">

        <h1>🅿️ PARKIR KABASA</h1>

        <p>Struk Pembayaran Parkir</p>

    </div>


    <div class="row">

        <span class="label">ID Parkir</span>

        <span class="value">
            #{{ $transaksi->id_parkir }}
        </span>

    </div>


    <div class="row">

        <span class="label">Plat Nomor</span>

        <span class="value">
            {{ $transaksi->plat_nomor }}
        </span>

    </div>


    <div class="row">

        <span class="label">Jenis</span>

        <span class="value">
            {{ ucfirst($transaksi->jenis_kendaraan) }}
        </span>

    </div>


    <div class="row">

        <span class="label">Pemilik</span>

        <span class="value">
            {{ $transaksi->pemilik }}
        </span>

    </div>


    <div class="row">

        <span class="label">Area Parkir</span>

        <span class="value">
            {{ $transaksi->nama_area }}
        </span>

    </div>


    <div class="row">

        <span class="label">Waktu Masuk</span>

        <span class="value">
            {{ $transaksi->waktu_masuk }}
        </span>

    </div>


    <div class="row">

        <span class="label">Waktu Keluar</span>

        <span class="value">
            {{ $transaksi->waktu_keluar }}
        </span>

    </div>


    <div class="row">

        <span class="label">Durasi</span>

        <span class="value">
            {{ $transaksi->durasi_jam }} Jam
        </span>

    </div>


    <div class="row">

        <span class="label">Tarif / Jam</span>

        <span class="value">
            Rp {{ number_format($transaksi->tarif_per_jam, 0, ',', '.') }}
        </span>

    </div>


    <div class="row total">

        <span class="label">
            TOTAL BAYAR
        </span>

        <span class="value">
            Rp {{ number_format($transaksi->biaya_total, 0, ',', '.') }}
        </span>

    </div>


    <div class="footer">

        Terima kasih telah menggunakan<br>
        layanan Parkir Kabasa 🚗💙

    </div>

</div>


<div class="buttons">

    <button onclick="window.print()" class="btn-cetak">

        🖨️ Cetak Struk

    </button>


    <a href="{{ route('petugas.transaksi.index') }}"
       class="btn-kembali">

        ← Kembali

    </a>

</div>

</body>

</html>