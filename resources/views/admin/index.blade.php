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
                        Dashboard
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-sliders fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('slide-index') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Quản lý slide</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('news-index') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Quản lý tin tức</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-map-marker fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('list-detail') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Quản lý khu vực</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('list-post-type') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Quản lý loại dự án</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('category-index') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Quản lý danh mục</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('list-property-type') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Quản lý loại hình</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('list-property') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Quản lý dự án</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('list-customer') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Thông tin khách hàng</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('list-member') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Thông tin thành viên</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div style="color: rgb(183 211 247" class="d-flex align-items-center">
                                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                <a href="{{ route('list-auction') }}" style="text-decoration: none"><div style="margin-left: 20px; font-size:20px" class="subheader">Hồ sơ người đấu giá</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
