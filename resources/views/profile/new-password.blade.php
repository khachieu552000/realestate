<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Đặt mật khẩu mới</title>
    <!-- CSS files -->
    <link href="{{ asset('frontend/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/dist/css/demo.min.css') }}" rel="stylesheet" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <form class="card card-md" action="{{ route('reset-password') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Nhập mật khẩu mới của bạn</h2>
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="mb-2">
                        <label class="form-label"> OTP</label>
                        <div class="input-group input-group-flat">
                            <input type="type" class="form-control" name="otp" placeholder="Mã OTP"
                                autocomplete="off">
                        </div>
                        @error('otp')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                       <div class="mb-2">
                        <label class="form-label"> Mật khẩu cấp 2</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" name="password_level_2" placeholder="Password"
                                autocomplete="off">
                        </div>
                        @error('password_level_2')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label"> Mật khẩu mới</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                autocomplete="off">
                        </div>
                        @error('password')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label"> Xác nhận mật khẩu mới</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Password"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Gửi</button>
                        <div class="text-center text-muted mt-3">
                            <a href="{{ route('register') }}">Tạo tài khoản mới</a>
                        </div>
                        <div class="text-center text-muted mt-3">
                            Bạn đã có tài khoản? <a href="{{ route('login') }}" tabindex="-1">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('fronted/dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('fronted/dist/js/demo.min.js') }}" defer></script>
</body>

</html>
