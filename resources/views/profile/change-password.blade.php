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
                <div class="col-6">
                    <form action="https://httpbin.org/post" method="post" class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thay đổi mật khẩu cấp 1</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Mật khẩu cũ</label>
                                                <input type="password" class="form-control" name="name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Mật khẩu mới</label>
                                                <input type="password" class="form-control" name="name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Xác nhận mật khẩu</label>
                                                <input type="password" class="form-control" name="name"/>
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
                <div class="col-6">
                    <form action="https://httpbin.org/post" method="post" class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thay đổi mật khẩu cấp 2</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Mật khẩu cũ</label>
                                                <input type="password" class="form-control" name="name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Mật khẩu mới</label>
                                                <input type="password" class="form-control" name="name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Xác nhận mật khẩu</label>
                                                <input type="password" class="form-control" name="name"/>
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
            </div>
        </div>
    </div>
</div>
@endsection
