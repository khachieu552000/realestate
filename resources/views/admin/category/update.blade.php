@extends('admin.layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-12">
                        <form action="{{ route('updateCategory', ['id_category' => $category->id]) }}" method="post"
                            class="card" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Thêm mới tin tức</h4>
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
                                                <label class="form-label required">Tên danh mục</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $category->name }}" />
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-label">Danh mục</div>
                                                <select class="form-select" name="parent_id">
                                                    <option value="0">Danh mục cha</option>
                                                    @if (isset($parent))
                                                        @foreach ($parent as $item)
                                                            <option @if ($item->id === $category->parent_id) selected @endif
                                                                value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
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
