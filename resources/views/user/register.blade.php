<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Đăng ký tài khoản</title>
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
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36"
                        alt=""></a>
            </div>
            <form class="card card-md" action="{{ route('register-mail') }}" method="post">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Đăng ký tài khoản</h2>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label required">Họ tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập họ tên"
                            value="{{ old('name') }}">
                        @error('name')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Giới tính</label>
                        <select class="form-control" name="gender">
                            <option value="">Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                        @error('gender')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Ngày sinh</label>
                        <input type="date" class="form-control" name="birthday" placeholder="Nhập ngày sinh"
                            value="{{ old('birthday') }}">
                        @error('birthday')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ"
                            value="{{ old('address') }}">
                        @error('address')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Mật khẩu</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"
                                value="{{ old('password') }}" autocomplete="off">
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
                        @error('password')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                Đã có tài khoản? <a href="{{ route('login') }}" tabindex="-1">Đăng nhập</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('frontend/dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('frontend/dist/js/demo.min.js') }}" defer></script>
</body>

</html>
