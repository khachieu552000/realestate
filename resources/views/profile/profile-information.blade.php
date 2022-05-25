@extends('admin.layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h2 class="page-title">
                            Trang cá nhân
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    @if (Session('login'))
                    <div class="col-12">
                        <form action="https://httpbin.org/post" method="post" class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin cá nhân</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-8">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Họ tên</label>
                                                    <input type="text" class="form-control" name="name" value="{{ Session('user_name') }}" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Email</label>
                                                    <input type="email" class="form-control" name="email" value="{{ Session('email') }}" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Điện thoại</label>
                                                    <input type="phone" class="form-control" name="phone" value="{{ Session('phone') }}" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Ngày sinh</label>
                                                    <input type="date" class="form-control" name="birthday" value="{{ Session('date') }}" disabled/>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-label">Giới tính</div>
                                                <div>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Nam" name="gender" checked disabled/>
                                                        <span class="form-check-label">Nam</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" value="Nữ"
                                                        @if (Session('date')=== "Nữ")
                                                        checked
                                                        @endif disabled
                                                        />
                                                        <span class="form-check-label">Nữ</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="address" value="{{ Session('address') }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @elseif (Auth::check())
                    <div class="col-12">
                        <form action="{{ route('update-profile-information') }}" method="POST" class="card">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Thông tin cá nhân</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-8">
                                        @if (session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Họ tên</label>
                                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->user_info->name }}"/>
                                                    @error('name')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Email</label>
                                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Điện thoại</label>
                                                    <input type="phone" class="form-control" name="phone" value="{{ Auth::user()->user_info->phone }}"/>
                                                    @error('phone')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Ngày sinh</label>
                                                    <input type="date" class="form-control" name="birthday" value="{{ Auth::user()->user_info->birthday }}"/>
                                                    @error('birthday')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-label">Giới tính</div>
                                                <div>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="Nam" name="gender" checked/>
                                                        <span class="form-check-label">Nam</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" value="Nữ"
                                                        @if (Auth::user()->user_info->gender === "Nữ")
                                                        checked
                                                        @endif/>
                                                        <span class="form-check-label">Nữ</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="address" value="{{ Auth::user()->user_info->address }}"/>
                                                    @error('address')
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
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
