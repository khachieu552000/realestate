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
                            Danh sách bất động sản
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
                                        <a href="{{ route('show-add-property') }}" class="btn btn-primary w-100">Thêm
                                            mới</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Session('login') || Auth::user()->role === 'user')
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-wrap datatable table-bordered" id="table-admin">
                                <thead>
                                    <tr>
                                        <th class="w-1">STT</th>
                                        <th>Tên</th>
                                        <th>Loại bất động sản</th>
                                        <th>Chủ đầu tư</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Diện tích</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th class="w-1">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($property_user))
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($property_user as $item)
                                            <tr>
                                                <td><span class="text-muted">{{ $index++ }}</span></td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->categories->name }}</td>
                                                <td>{{ $item->investor }}</td>
                                                <td><img src="{{ asset($item->image) }}" height="50" width="200"
                                                        alt=""></td>
                                                <td>{{ number_format($item->price) }} VNĐ</td>
                                                <td>{{ $item->acreage }}</td>
                                                <td>{{ $item->street->name }}, {{ $item->street->ward->name }}
                                                </td>
                                                <td>
                                                    @if ($item->status === 'deactive')
                                                    <b style="color: red">Chưa duyệt</b>
                                                    @elseif ($item->status === 'active')
                                                    <b style="color: green">Đã duyệt</b> |
                                                    <a href="{{ route('end-property', ['id_property'=>$item->id]) }}" class="btn btn-primary w-20" href="">Kết thúc</a>
                                                    @elseif ($item->status === 'end')
                                                    <b style="color: orangered">Kết thúc</b>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{ route('show-update-property', ['id_property' => $item->id]) }}"
                                                        class="btn btn-primary w-20">Sửa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @elseif (Auth::user()->role === 'admin')
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-wrap datatable table-bordered" id="table-admin">
                                    <thead>
                                        <tr>
                                            <th class="w-1">STT</th>
                                            <th>Tên</th>
                                            <th>Loại bất động sản</th>
                                            <th>Chủ đầu tư</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá</th>
                                            <th>Diện tích</th>
                                            <th>Địa chỉ</th>
                                            <th>Duyệt</th>
                                            <th class="w-1">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($property))
                                            @php
                                                $index = 1;
                                            @endphp
                                            @foreach ($property as $item)
                                                <tr>
                                                    <td><span class="text-muted">{{ $index++ }}</span></td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->categories->name }}</td>
                                                    <td>{{ $item->investor }}</td>
                                                    <td><img src="{{ asset($item->image) }}" height="50" width="200"
                                                            alt=""></td>
                                                    <td>{{ number_format($item->price) }} VNĐ</td>
                                                    <td>{{ $item->acreage }}</td>
                                                    <td>{{ $item->street->name }}, {{ $item->street->ward->name }}</td>
                                                    <td>
                                                        @if ($item->status === 'deactive')
                                                            <a href="{{ route('active-property', ['id_property' => $item->id]) }}"
                                                                class="btn btn-primary w-20">Duyệt</a>
                                                        @elseif ($item->status === 'active')
                                                            <b style="color: green">Đã duyệt</b> |
                                                            <a href="{{ route('end-property', ['id_property'=>$item->id]) }}" class="btn btn-primary w-20" href="">Kết thúc</a>
                                                        @elseif ($item->status === 'end')
                                                        <b style="color: orangered">Kết thúc</b>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{ route('show-update-property', ['id_property' => $item->id]) }}"
                                                            class="btn btn-primary w-20">Sửa</a>
                                                        <a href="{{ route('delete-property', ['id_property' => $item->id]) }}"
                                                            class="btn btn-primary w-20">Xoá</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
