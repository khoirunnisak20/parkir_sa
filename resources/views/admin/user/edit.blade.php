<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User</title>

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
            transition: 0.2s;
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

        .btn-update {
            background: #1E4E8C;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-update:hover {
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

    </style>

</head>

<body>

    <div class="container">

        <div class="header">
            <h1>✏️ Edit User</h1>
            <p>Ubah informasi user yang diperlukan.</p>
        </div>


        <div class="card">

            <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST">

                @csrf
                @method('PUT')


                <div class="form-group">

                    <label>Nama Lengkap</label>

                    <input type="text"
                        name="nama_lengkap"
                        value="{{ $user->nama_lengkap }}"
                        required>

                </div>


                <div class="form-group">

                    <label>Username</label>

                    <input type="text"
                        name="username"
                        value="{{ $user->username }}"
                        required>

                </div>


                <div class="form-group">

                    <label>Role</label>

                    <select name="role" required>

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="petugas"
                            {{ $user->role == 'petugas' ? 'selected' : '' }}>
                            Petugas
                        </option>

                        <option value="owner"
                            {{ $user->role == 'owner' ? 'selected' : '' }}>
                            Owner
                        </option>

                    </select>

                </div>


                <div class="button-group">

                    <button type="submit" class="btn-update">
                        💾 Update User
                    </button>

                    <a href="{{ route('admin.user.index') }}"
                        class="btn-kembali">

                        ← Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>