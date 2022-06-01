@extends('admin.layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-12">
                        <form action="{{ route('update-post-type', ['id_post_type'=> $post_type->id]) }}" method="post" class="card">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Cập nhật loại bài đăng</h4>
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
                                                <label class="form-label required">Tên</label>
                                                <input type="text" class="form-control" name="name" value="{{ $post_type->name }}"/>
                                                @error('name')
                                                <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Giá tiền</label>
                                                <input type="number" class="form-control" name="price" value="{{ $post_type->price }}"/>
                                                @error('price')
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
