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
                            Danh sách bất động sản
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
        </div>
        <div class="page-body">
            <div class="container-xxl">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        <a href="{{ route('show-add-property') }}" class="btn btn-primary w-100">Thêm
                                            mới</a>
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm"
                                                aria-label="Search invoice">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Session('login') || Auth::user()->role === 'user')
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-wrap datatable table-bordered">
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
                                <table class="table card-table table-vcenter text-wrap datatable table-bordered">
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
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries
                            </p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="15 6 9 12 15 18" />
                                        </svg>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        next
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="9 6 15 12 9 18" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
