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
                            Danh sách chi tiết
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Import excel
                                          </button>
                                    </div>
                                    <div class="text-muted" style="margin-left: 10px">
                                        <a href="{{ route('export-location') }}" class="btn btn-primary w-100">Export excel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable table-bordered" id="table-admin">
                                <thead>
                                    <tr>
                                        <th class="w-1">STT</th>
                                        <th>Tỉnh/Thành phố</th>
                                        <th>Quận/Huyện</th>
                                        <th>Phường/Xã</th>
                                        <th>Đường/Phố</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($location))
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($location as $provinces)
                                            {{-- <tr> --}}

                                            {{-- <td>{{ $provinces->name }}</td> --}}
                                            {{-- <td><span class="text-muted">{{ $index++ }}</span></td> --}}
                                            @foreach ($provinces->district as $district)
                                                @if (count($district->ward) == 0)
                                                    <tr>
                                                        <td> {{ $index++ }}</td>
                                                        <td>{{ $provinces->name }}</td>
                                                        <td>{{ $district->name }}</td>
                                                    </tr>
                                                @else
                                                    @foreach ($district->ward as $ward)
                                                    @if (count($ward->street) == 0)
                                                    <tr>
                                                        <td> {{ $index++ }}</td>
                                                        <td>{{ $provinces->name }}</td>
                                                        <td>{{ $district->name }}</td>
                                                        <td>{{ $ward->name }}</td>
                                                    </tr>
                                                    @else
                                                    @foreach ($ward->street as $street)
                                                    <tr>
                                                        <td> {{ $index++ }}</td>
                                                        <td>{{ $provinces->name }}</td>
                                                        <td>{{ $district->name }}</td>
                                                        <td>{{ $ward->name }}</td>
                                                        <td>{{ $street->name }}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            {{-- <td>{{ $ward->district->provinces?$ward->district->provinces->name:' ' }}</td>
                                                <td>{{ $ward->district?$ward->district->name:' ' }}</td>
                                                <td>{{ $ward->name?$ward->name:'null' }}</td> --}}
                                            {{-- </tr> --}}
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
    @include('admin.location.modal-import')
@endsection


