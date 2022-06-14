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
                            Quản lý loại hình bất động sản
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
                                            Thêm mới
                                          </button>
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
                                        <th>Trạng thái</th>
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
                                                <td>
                                                    @if ($item->status === 0)
                                                    Công khai |  <a href="{{ route('lock-status', ['id_property_type' => $item->id]) }}" class="btn btn-danger w-20" href="">Khoá</a>
                                                    @elseif ($item->status === 1)
                                                    <b>Chỉ mình quản trị viên</b>
                                                    @endif
                                                </td>
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
