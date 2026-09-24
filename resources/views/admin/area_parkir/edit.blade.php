<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Area Parkir</title>

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
            color: #1E4E8C;
            margin-bottom: 25px;
            text-align: center;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #1E4E8C;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-update {
            background: #f59e0b;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-update:hover {
            background: #d97706;
        }

        .btn-kembali {
            margin-left: 10px;
            text-decoration: none;
            color: #555;
            font-weight: bold;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>✏️ Edit Area Parkir</h1>

        <form action="{{ route('admin.area.update', $area->id_area) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Nama Area</label>

                <input type="text"
                       name="nama_area"
                       value="{{ $area->nama_area }}"
                       required>

                @error('nama_area')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Kapasitas</label>

                <input type="number"
                       name="kapasitas"
                       value="{{ $area->kapasitas }}"
                       min="1"
                       required>

                @error('kapasitas')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <button type="submit" class="btn-update">
                💾 Update
            </button>

            <a href="{{ route('admin.area.index') }}"
               class="btn-kembali">
                ← Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>