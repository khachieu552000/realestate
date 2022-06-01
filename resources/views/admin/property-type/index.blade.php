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
                            Quản lý loại hình bất động sản
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
                                            Thêm mới
                                          </button>
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
                                        <th>Tên danh mục</th>
                                        <th class="w-1">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($property_type))
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($property_type as $item)
                                            <tr>
                                                <td><span class="text-muted">{{ $index++ }}</span></td>
                                                <td>{{ $item->name }}</td>
                                                <td class="text-end">
                                                    <a href="#" data-url="{{ route('show-update-property-type', ['id_property_type' => $item->id]) }}"
                                                        class="btn btn-primary w-20 btn-edit">Sửa</a>
                                                    <a href="{{ route('delete-property-type', ['id_property_type' => $item->id]) }}" class="btn btn-primary w-20">Xoá</a>
                                                </td>
                                            </tr>
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
    @include('admin.property-type.modal-add')
    @include('admin.property-type.modal-update')
@endsection
@section('script')
    <script>
        $('.btn-edit').click(function(e) {
            var url = $(this).attr('data-url');
            $('#modal-edit').modal('show');
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    $('#name-edit').val(response.data.name);
                    $('#name-lsp').val(response.data.name);
                    $('#form-edit').attr('action', '{{ asset('admin/property-type/update-property-type/') }}/' +
                        response.data
                        .id)
                },
                error: function(error) {

                }
            })
        })
    </script>
@endsection
