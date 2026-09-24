<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tarif</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            color: #1E4E8C;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-top: 20px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .btn-simpan {
            background: #1E4E8C;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            margin-top: 25px;
            cursor: pointer;
        }

        .btn-kembali {
            margin-left: 10px;
            text-decoration: none;
        }
    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>💰 Tambah Tarif</h1>

        <form action="{{ route('admin.tarif.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label>Jenis Kendaraan</label>

                <select name="jenis_kendaraan" required>

                    <option value="">-- Pilih Jenis Kendaraan --</option>

                    <option value="motor">Motor</option>

                    <option value="mobil">Mobil</option>

                    <option value="lainnya">Lainnya</option>

                </select>

            </div>


            <div class="form-group">

                <label>Tarif per Jam</label>

                <input type="number"
                       name="tarif_per_jam"
                       placeholder="Contoh: 3000"
                       min="0"
                       required>

            </div>


            <button type="submit" class="btn-simpan">
                💾 Simpan
            </button>

            <a href="{{ route('admin.tarif.index') }}"
               class="btn-kembali">
                ← Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>