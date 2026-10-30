<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Lupa Kata Sandi - Parkir Kabosa</title>


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            min-height: 100vh;

            font-family: 'Inter', sans-serif;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(255,255,255,.18),
                    transparent 28%
                ),
                linear-gradient(
                    180deg,
                    #A9D5EE 0%,
                    #8FC5E4 48%,
                    #DDEBF5 100%
                );

            position: relative;

            overflow: hidden;

            color: #16345C;

        }


        body::before {

            content: "";

            position: absolute;

            left: -5%;

            bottom: 90px;

            width: 110%;

            height: 170px;

            background: rgba(255,255,255,.22);

            border-radius:
                50% 50% 0 0 /
                35% 35% 0 0;

            transform: rotate(2deg);

        }


        body::after {

            content: "";

            position: absolute;

            left: -5%;

            bottom: -10px;

            width: 110%;

            height: 150px;

            background: rgba(255,255,255,.45);

            border-radius:
                50% 50% 0 0 /
                35% 35% 0 0;

            transform: rotate(-2deg);

        }


        /* =====================================================
           CARD
        ===================================================== */

        .card {

            position: relative;

            z-index: 5;

            width: 400px;

            background: rgba(255,255,255,.98);

            padding: 42px 40px 38px;

            border-radius: 22px;

            box-shadow:
                0 25px 55px rgba(23,40,74,.20);

        }


        /* =====================================================
           ICON
        ===================================================== */

        .icon-area {

            width: 100%;

            height: 70px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 12px;

        }


        .icon {

            width: 62px;

            height: 62px;

            border-radius: 18px;

            background: #E3EDFB;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 30px;

            box-shadow:
                0 8px 18px rgba(62,107,168,.12);

        }


        /* =====================================================
           JUDUL
        ===================================================== */

        h1 {

            font-family: 'Fraunces', serif;

            font-size: 31px;

            font-weight: 600;

            color: #16345C;

            margin-bottom: 8px;

        }


        .subtitle {

            color: #7189A8;

            font-size: 14px;

            line-height: 1.6;

            margin-bottom: 25px;

        }


        /* =====================================================
           ERROR
        ===================================================== */

        .error {

            background: #FEE2E2;

            color: #B91C1C;

            border: 1px solid #FECACA;

            padding: 12px 14px;

            border-radius: 10px;

            margin-bottom: 18px;

            font-size: 13px;

        }


        .error ul {

            margin-left: 18px;

            margin-top: 6px;

        }


        .error li {

            margin-bottom: 3px;

        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {

            margin-bottom: 18px;

        }


        label {

            display: block;

            font-size: 13px;

            font-weight: 600;

            color: #16345C;

            margin-bottom: 8px;

        }


        input {

            width: 100%;

            height: 44px;

            padding: 0 14px;

            border: 1px solid #D5E0EC;

            border-radius: 10px;

            background: #FBFCFE;

            color: #16345C;

            font-family: 'Inter', sans-serif;

            font-size: 13px;

            transition: .2s ease;

        }


        input:focus {

            outline: none;

            background: white;

            border-color: #3E6BA8;

            box-shadow:
                0 0 0 4px rgba(62,107,168,.10);

        }


        input::placeholder {

            color: #A9BCD1;

        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .btn-reset {

            width: 100%;

            height: 44px;

            border: none;

            border-radius: 10px;

            background: #285995;

            color: white;

            font-family: 'Inter', sans-serif;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s ease;

            box-shadow:
                0 7px 16px rgba(40,89,149,.20);

            margin-top: 5px;

        }


        .btn-reset:hover {

            background: #204B83;

            transform: translateY(-1px);

            box-shadow:
                0 9px 20px rgba(40,89,149,.26);

        }


        /* =====================================================
           KEMBALI
        ===================================================== */

        .back-login {

            display: block;

            text-align: center;

            margin-top: 20px;

            color: #2E5F9D;

            text-decoration: none;

            font-size: 12px;

            font-weight: 500;

        }


        .back-login:hover {

            text-decoration: underline;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 500px) {

            .card {

                width: calc(100% - 30px);

                padding:
                    35px 25px 36px;

            }

            h1 {

                font-size: 29px;

            }

        }

    </style>

</head>


<body>


    <div class="card">


        <!-- ICON -->

        <div class="icon-area">

            <div class="icon">

                🔐

            </div>

        </div>


        <!-- JUDUL -->

        <h1>

            Lupa Kata Sandi?

        </h1>


        <p class="subtitle">

            Masukkan username dan buat kata sandi
            baru untuk akun kamu.

        </p>


        <!-- ERROR -->

        @if(session('error'))

            <div class="error">

                ❌ {{ session('error') }}

            </div>

        @endif


        @if($errors->any())

            <div class="error">

                <strong>
                    Gagal mengubah password:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- FORM -->

        <form
            action="{{ route('password.reset') }}"
            method="POST"
        >

            @csrf


            <!-- USERNAME -->

            <div class="form-group">

                <label for="username">

                    Username

                </label>


                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username"
                    value="{{ old('username') }}"
                    required
                    autofocus
                >

            </div>


            <!-- PASSWORD BARU -->

            <div class="form-group">

                <label for="password">

                    Kata sandi baru

                </label>


                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan kata sandi baru"
                    required
                >

            </div>


            <!-- KONFIRMASI -->

            <div class="form-group">

                <label for="password_confirmation">

                    Konfirmasi kata sandi

                </label>


                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi kata sandi baru"
                    required
                >

            </div>


            <!-- BUTTON -->

            <button
                type="submit"
                class="btn-reset"
            >

                Ubah Kata Sandi

            </button>


        </form>


        <!-- KEMBALI -->

        <a
            href="{{ route('login') }}"
            class="back-login"
        >

            ← Kembali ke Login

        </a>


    </div>


</body>

</html>