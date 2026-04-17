<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SIG Sekolah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #5a8dee, #3a6fd8);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 420px;
            padding: 30px;
        }

        .box {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px 30px;
            color: white;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        }

        .box h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .box p {
            text-align: center;
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: none;
            outline: none;
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .input-group input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .btn {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: none;
            background: white;
            color: #3a6fd8;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #eaeaea;
        }

        .error {
            font-size: 13px;
            color: #ffb3b3;
            margin-top: 5px;
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            font-size: 13px;
            opacity: 0.85;
        }

        .login-link a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="box">
        <h1>SIG Sekolah</h1>
        <p>Buat akun baru untuk melanjutkan</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group">
                <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi password" required>
            </div>

            <button type="submit" class="btn">Register</button>
        </form>

        <div class="login-link">
            Sudah punya akun? 
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>

</body>
</html>