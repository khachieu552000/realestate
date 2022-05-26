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
                    <h2 class="card-title text-center mb-4">Nhập mật khẩu cấp 2 của bạn</h2>
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
                    <div class="mb-2">
                        <label class="form-label"> Mật khẩu cấp 2</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" name="password_level_2" placeholder="Password"
                                autocomplete="off">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                        @error('password_level_2')
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
