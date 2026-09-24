<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Parkir Kabosa</title>

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


        /* =====================================================
           BACKGROUND GELOMBANG
        ===================================================== */

        body::before {
            content: "";

            position: absolute;

            left: -5%;
            bottom: 90px;

            width: 110%;
            height: 170px;

            background: rgba(255,255,255,.22);

            border-radius: 50% 50% 0 0 / 35% 35% 0 0;

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

            border-radius: 50% 50% 0 0 / 35% 35% 0 0;

            transform: rotate(-2deg);
        }


        /* =====================================================
           LOGIN CARD
        ===================================================== */

        .login-card {

            position: relative;

            z-index: 5;

            width: 400px;

            background: rgba(255,255,255,.98);

            padding: 42px 40px 43px;

            border-radius: 22px;

            box-shadow:
                0 25px 55px rgba(23,40,74,.20);

        }


        /* =====================================================
           GAMBAR MOBIL
        ===================================================== */

        .car-area {

            width: 100%;

            height: 75px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 8px;

        }


        .car {

            position: relative;

            width: 145px;

            height: 72px;

            animation: carFloat 3s ease-in-out infinite;

        }


        @keyframes carFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-4px);
            }

        }


        /* BADAN MOBIL */

        .car-body {

            position: absolute;

            width: 145px;
            height: 39px;

            left: 0;
            bottom: 13px;

            background: #3E6BA8;

            border-radius:
                18px
                25px
                10px
                10px;

            box-shadow:
                0 5px 8px rgba(23,40,74,.15);

        }


        /* ATAP MOBIL */

        .car-roof {

            position: absolute;

            width: 83px;
            height: 35px;

            left: 31px;
            bottom: 43px;

            background: #3E6BA8;

            border-radius:
                45px
                45px
                4px
                4px;

        }


        /* KACA DEPAN */

        .window-front {

            position: absolute;

            width: 32px;
            height: 22px;

            left: 76px;
            bottom: 47px;

            background: #DCEBFA;

            border: 2px solid white;

            border-radius:
                4px
                14px
                4px
                4px;

            z-index: 3;

        }


        /* KACA BELAKANG */

        .window-back {

            position: absolute;

            width: 32px;
            height: 22px;

            left: 40px;
            bottom: 47px;

            background: #DCEBFA;

            border: 2px solid white;

            border-radius:
                14px
                4px
                4px
                4px;

            z-index: 3;

        }


        /* GARIS TENGAH */

        .car-line {

            position: absolute;

            width: 2px;
            height: 20px;

            background: rgba(255,255,255,.8);

            left: 72px;
            bottom: 47px;

            z-index: 4;

        }


        /* RODA */

        .wheel {

            position: absolute;

            width: 29px;
            height: 29px;

            bottom: 0;

            background: #17284A;

            border-radius: 50%;

            border: 3px solid #FFFFFF;

            z-index: 5;

        }


        .wheel::after {

            content: "";

            position: absolute;

            width: 9px;
            height: 9px;

            background: #AFC1D6;

            border-radius: 50%;

            top: 7px;
            left: 7px;

        }


        .wheel-left {
            left: 22px;
        }


        .wheel-right {
            right: 22px;
        }


        /* LAMPU */

        .head-light {

            position: absolute;

            width: 9px;
            height: 10px;

            background: #FFE8A3;

            border-radius: 4px;

            right: 2px;

            bottom: 30px;

            z-index: 6;

            box-shadow:
                0 0 7px rgba(255,232,163,.7);

        }


        .tail-light {

            position: absolute;

            width: 8px;
            height: 10px;

            background: #E78B8B;

            border-radius: 3px;

            left: 2px;

            bottom: 30px;

            z-index: 6;

        }


        /* =====================================================
           JUDUL
        ===================================================== */

        h1 {

            font-family: 'Fraunces', serif;

            font-size: 32px;

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


        input[type="text"],
        input[type="password"] {

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


        input[type="text"]:focus,
        input[type="password"]:focus {

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
           REMEMBER + LUPA PASSWORD
        ===================================================== */

        .form-options {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 2px;

            margin-bottom: 25px;

        }


        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 12px;

            color: #7189A8;

        }


        .remember input {

            width: 15px;
            height: 15px;

            accent-color: #3E6BA8;

        }


        .remember label {

            margin: 0;

            font-size: 12px;

            font-weight: 400;

            color: #7189A8;

            cursor: pointer;

        }


        .forgot {

            font-size: 12px;

            color: #2E5F9D;

            text-decoration: none;

            font-weight: 500;

        }


        .forgot:hover {

            text-decoration: underline;

        }


        /* =====================================================
           BUTTON LOGIN
        ===================================================== */

        .btn-login {

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

        }


        .btn-login:hover {

            background: #204B83;

            transform: translateY(-1px);

            box-shadow:
                0 9px 20px rgba(40,89,149,.26);

        }


        .btn-login:active {

            transform: translateY(0);

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 500px) {

            .login-card {

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


    <!-- =====================================================
         LOGIN CARD
    ===================================================== -->

    <div class="login-card">


        <!-- GAMBAR MOBIL -->

        <div class="car-area">

            <div class="car">

                <div class="car-roof"></div>

                <div class="window-back"></div>

                <div class="window-front"></div>

                <div class="car-line"></div>

                <div class="car-body"></div>

                <div class="tail-light"></div>

                <div class="head-light"></div>

                <div class="wheel wheel-left"></div>

                <div class="wheel wheel-right"></div>

            </div>

        </div>


        <!-- JUDUL -->

        <h1>
            Masuk
        </h1>


        <p class="subtitle">
            Masukkan username dan kata sandi untuk
            melanjutkan.
        </p>


        <!-- ERROR -->

        @if($errors->any())

            <div class="error">

                <strong>
                    Login gagal:
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


        <!-- FORM LOGIN -->

        <form action="{{ route('login.proses') }}"
              method="POST">

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


            <!-- PASSWORD -->

            <div class="form-group">

                <label for="password">
                    Kata sandi
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan kata sandi"
                    required
                >

            </div>


            <!-- OPTIONS -->

            <div class="form-options">

                <div class="remember">

                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                    >

                    <label for="remember">
                        Ingat saya
                    </label>

                </div>


                <a href="#"
                   class="forgot">

                    Lupa kata sandi?

                </a>

            </div>


            <!-- LOGIN -->

            <button
                type="submit"
                class="btn-login">

                Masuk

            </button>


        </form>


    </div>


</body>

</html>