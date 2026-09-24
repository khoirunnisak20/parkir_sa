<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Tarif</title>

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

        .btn-update {
            background: #f59e0b;
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

        <h1>✏️ Edit Tarif</h1>

        <form action="{{ route('admin.tarif.update', $tarif->id_tarif) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Jenis Kendaraan</label>

                <select name="jenis_kendaraan" required>

                    <option value="motor"
                        {{ $tarif->jenis_kendaraan == 'motor' ? 'selected' : '' }}>
                        Motor
                    </option>

                    <option value="mobil"
                        {{ $tarif->jenis_kendaraan == 'mobil' ? 'selected' : '' }}>
                        Mobil
                    </option>

                    <option value="lainnya"
                        {{ $tarif->jenis_kendaraan == 'lainnya' ? 'selected' : '' }}>
                        Lainnya
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label>Tarif per Jam</label>

                <input type="number"
                       name="tarif_per_jam"
                       value="{{ $tarif->tarif_per_jam }}"
                       min="0"
                       required>

            </div>


            <button type="submit" class="btn-update">
                💾 Update
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