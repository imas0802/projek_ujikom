<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIG Sekolah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #5a8dee, #3a6fd8);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            color: white;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        }

        .login-box h1 {
            margin-bottom: 10px;
        }

        .login-box p {
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

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            margin: 10px 0 20px;
        }

        .remember input {
            accent-color: white;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: none;
            background: white;
            color: #3a6fd8;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #eaeaea;
        }

        .error {
            color: #ffb3b3;
            font-size: 13px;
            margin-top: 5px;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h1>SIG Sekolah</h1>
        <p>Silakan login untuk melanjutkan</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <input type="email" name="email" placeholder="Masukkan email"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Masukkan password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</div>

</body>
</html>