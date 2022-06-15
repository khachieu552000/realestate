@extends('admin.layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="container-xxl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h2 class="page-title">
                            Danh sách đấu giá
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        </div>
        <div class="page-body">
            <div class="container-xxl">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <div class="card-body py-1">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        <a href="" class="btn btn-primary w-100">Thêm
                                            mới</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable table-bordered" id="table-admin">
                                <thead>
                                    <tr>
                                        <th class="w-1">STT</th>
                                        <th>Dự án</th>
                                        <th>Tên</th>
                                        <th>CCCD/CMND</th>
                                        <th>Địa chỉ</th>
                                        <th>Điện thoại</th>
                                        <th>Số tiền</th>
                                        {{-- <th class="w-1">#</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($list_auctioneer))
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($list_auctioneer as $list)
                                            <tr>
                                                <td><span class="text-muted">{{ $index++ }}</span></td>
                                                <td>{{ $list->property->name }}</td>
                                                <td>{{ $list->auctioneer_profile->name }}</td>
                                                <td>{{ $list->auctioneer_profile->citizen_identification }}</td>
                                                <td>{{ $list->auctioneer_profile->address }}</td>
                                                <td>{{ $list->auctioneer_profile->phone }}</td>
                                                <td>{{ number_format($list->price) }} VNĐ</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
