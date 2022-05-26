@extends('admin.layouts.layout')
@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">Trang cá nhân</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form action="{{ route('set-password-level-two') }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Đặt mật khẩu cấp 2</h4>
                        </div>
                        @if (Auth::user()->password_level_2 === null)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-8">
                                    <div class="row">
                                        @if (session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                        @endif
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Mật khẩu</label>
                                                <input type="password" class="form-control" name="password"/>
                                                @error('password')
                                                <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Xác nhận mật khẩu</label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password"/>
                                                @error('confirm_password')
                                                <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2"></div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary ms-auto">Lưu</button>
                            </div>
                        </div>
                        @else
                        <div class="card-body">
                            <div class="row">
                                <p>Bạn đã có mật khẩu cấp 2. <br>
                                    <a href="{{ route('change-password') }}">Đổi mật khẩu</a>
                                </p>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('script')
<script type="text/javascript">
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Xác nhận mật khẩu không đúng!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>

@endsection --}}
