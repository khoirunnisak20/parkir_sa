<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kendaraan</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            color: #1E4E8C;
            font-size: 30px;
        }

        .header p {
            color: #6E88A8;
            margin-top: 8px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #16345C;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #DCE6F0;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #6FB7E8;
            box-shadow: 0 0 0 3px rgba(111, 183, 232, 0.25);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-simpan {
            background: #1E4E8C;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-simpan:hover {
            background: #2A5FA3;
        }

        .btn-kembali {
            background: #e5edf4;
            color: #16345C;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-kembali:hover {
            background: #d6e1eb;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">
        <h1>🚗 Tambah Kendaraan</h1>
        <p>Masukkan data kendaraan baru ke dalam sistem.</p>
    </div>


    <div class="card">

        <form action="{{ route('admin.kendaraan.store') }}" method="POST">

            @csrf


            <!-- PLAT NOMOR -->
            <div class="form-group">

                <label>Plat Nomor</label>

                <input type="text"
                    name="plat_nomor"
                    placeholder="Contoh: N 1234 AB"
                    value="{{ old('plat_nomor') }}"
                    required>

                @error('plat_nomor')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <!-- JENIS KENDARAAN -->
            <div class="form-group">

                <label>Jenis Kendaraan</label>

                <select name="jenis_kendaraan" required>

                    <option value="">-- Pilih Jenis Kendaraan --</option>

                    <option value="motor">Motor</option>

                    <option value="mobil">Mobil</option>

                    <option value="lainnya">Lainnya</option>

                </select>

                @error('jenis_kendaraan')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <!-- PEMILIK -->
            <div class="form-group">

                <label>Nama Pemilik</label>

                <input type="text"
                    name="pemilik"
                    placeholder="Masukkan nama pemilik"
                    value="{{ old('pemilik') }}"
                    required>

                @error('pemilik')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="button-group">

                <button type="submit" class="btn-simpan">
                    💾 Simpan Kendaraan
                </button>

                <a href="{{ route('admin.kendaraan.index') }}"
                   class="btn-kembali">
                    ← Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>