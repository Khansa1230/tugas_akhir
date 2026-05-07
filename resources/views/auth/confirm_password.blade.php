<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
                <h1 class="auth-title">Reset Password</h1>
                <p class="auth-subtitle mb-5">
                    Masukkan password baru Anda.
                </p>

                <form method="post" action="{{ route('forgot.confirm_password') }}">
                    @csrf

                    <input type="hidden" name="email_uin" value="{{ $email_uin }}">

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror form-control-xl"
                               placeholder="Password Baru">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                            <small class="btn btn-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" id="password_confirmation"
                               name="password_confirmation"
                               class="form-control @error('password_confirmation') is-invalid @enderror form-control-xl"
                               placeholder="Konfirmasi Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password_confirmation')
                            <small class="btn btn-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                        Reset Password
                    </button>
                </form>

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