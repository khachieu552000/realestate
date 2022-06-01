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
                            Danh sách chi tiết
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
            <div class="container-xl">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Import excel
                                          </button>
                                    </div>
                                    <div class="text-muted" style="margin-left: 10px">
                                        <a href="{{ route('export-location') }}" class="btn btn-primary w-100">Export excel</a>
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
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable table-bordered">
                                <thead>
                                    <tr>
                                        <th class="w-1">STT</th>
                                        <th>Tỉnh/Thành phố</th>
                                        <th>Quận/Huyện</th>
                                        <th>Phường/Xã</th>
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
                                                        <tr>
                                                            <td> {{ $index++ }}</td>
                                                            <td>{{ $provinces->name }}</td>
                                                            <td>{{ $district->name }}</td>
                                                            <td>{{ $ward->name }}</td>
                                                        </tr>
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
    @include('admin.location.modal-import')
@endsection


