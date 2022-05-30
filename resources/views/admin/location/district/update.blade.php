@extends('admin.layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-12">
                        <form action="{{ route('update-district', ['id_district'=>$district->id]) }}" method="post" class="card">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Thêm mới tỉnh/thành phố</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-8">
                                        <div class="row">
                                            @if (session('message'))
                                                <div class="alert alert-success">
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                            <div class="mb-3">
                                                <label class="form-label required">Tỉnh/thành phố</label>
                                                <select name="provinces" class="form-control">
                                                    <option value="">Chọn tỉnh/Thành phố</option>
                                                    @if (isset($provinces))
                                                    @foreach ($provinces as $item)
                                                    <option
                                                    @if ($item->id === $district->provinces_id)
                                                    selected
                                                    @endif
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @error('provinces')
                                                <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Tên Quận/Huyện</label>
                                                <input type="text" class="form-control" name="name_district" value="{{ $district->name }}" />
                                                @error('name_district')
                                                <p style="color: red">{{ $message }}</p>
                                                @enderror
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
