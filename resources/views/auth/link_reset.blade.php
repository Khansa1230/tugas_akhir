<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Reset</title>
    <link rel="stylesheet" href="{{ asset('templete/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('templete/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('templete/assets/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="auth-title">Reset Link</h1>
                <p class="auth-subtitle mb-5">
                    Klik link di bawah ini untuk melanjutkan reset password.
                </p>

                <div class="form-group mb-4">
                    <input type="text" class="form-control form-control-xl"
                           value="{{ $resetLink }}" readonly>
                </div>

                <a href="{{ $resetLink }}"
                   class="btn btn-primary btn-block btn-lg shadow-lg mt-3">
                    Buka Halaman Reset
                </a>

                <div class="text-center mt-5 text-lg fs-4">
                    <a href="{{ route('login') }}" class="font-bold">Kembali ke Login</a>
                </div>
            </div>
        </div>

        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
</div>
</body>
</html>