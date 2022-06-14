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
                            Danh sách tỉnh/thành phố
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
                        <div class="card-header">
                            <div class="card-body py-1">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        <a href="{{ route('show-add-provinces') }}" class="btn btn-primary w-100">Thêm
                                            mới</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable table-bordered" id="table-admin">
                                <thead>
                                    <tr>
                                        <th class="w-1">STT</th>
                                        <th>Tên</th>
                                        <th class="w-1">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($provinces))
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($provinces as $item)
                                            <tr>
                                                <td><span class="text-muted">{{ $index++ }}</span></td>
                                                <td>{{ $item->name }}</td>
                                                <td class="text-end">
                                                    <a href="{{ route('show-update-province', ['id_provinces'=>$item->id]) }}" class="btn btn-primary w-20">Sửa</a>
                                                    <a href="{{ route('delete-provinces', ['id_provinces'=>$item->id]) }}" class="btn btn-primary w-20">Xoá</a>
                                                </td>
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
