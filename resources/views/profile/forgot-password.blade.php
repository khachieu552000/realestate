<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Quên mật khẩu</title>
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
            <form class="card card-md" action="{{ route('check-password-level-two') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Nhập mật email của bạn</h2>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                            autocomplete="off">
                        @error('email')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
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
