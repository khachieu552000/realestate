@extends('admin.layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="container mt-3">
                            <form action="" method="post" class="card">
                                @csrf
                                <div class="card-header">
                                    <h4 class="card-title">Cập nhật dự án</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="row">
                                                @if (session('message'))
                                                    <div class="alert alert-success">
                                                        {{ session('message') }}
                                                    </div>
                                                @endif
                                                <div class="mb-3">
                                                    <label class="form-label required">Danh mục dự án</label>
                                                    <select name="category" class="form-control">
                                                        <option value="">Chọn danh mục dự án</option>
                                                        @foreach ($category as $cate)
                                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Chọn loại hình</label>
                                                    <select name="property_type" class="form-control">
                                                        <option value="">Chọn danh loại hình</option>
                                                        @foreach ($property_type as $pt)
                                                        <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('property_type')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Chủ đầu tư</label>
                                                    <input type="text" class="form-control" name="investor" />
                                                    @error('invester')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Tên dự án</label>
                                                    <input type="text" class="form-control" name="name" />
                                                    @error('name')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Giá</label>
                                                    <input type="text" class="form-control" name="price" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Số tầng</label>
                                                    <input type="text" class="form-control" name="floors" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Diện tích</label>
                                                    <input type="text" class="form-control" name="acreage" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Giấy tờ pháp lý</label>
                                                    <input type="text" class="form-control" name="juridical" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Hình ảnh</label>
                                                    <input type="file" class="form-control" name="images" />
                                                    @error('images')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label class="form-label required">Tỉnh/thành phố</label>
                                                    <select class="form-control choose provinces" name="provinces"
                                                        id="provinces">
                                                        <option value="">Chọn tỉnh/Thành phố</option>
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">
                                                                {{ $province->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('provinces')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Quận/Huyện</label>
                                                    <select class="form-control district choose" name="district"
                                                        id="district">
                                                        <option value="">Chọn quận/huyện</option>
                                                    </select>
                                                    @error('district')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Phường/Xã</label>
                                                    <select class="form-control ward choose" name="ward" id="ward">
                                                        <option value="">Chọn phường/xã</option>
                                                    </select>
                                                    @error('ward')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Đường/Phố</label>
                                                    <select class="form-control" name="street" id="street">
                                                        <option value="">Chọn đường/phố</option>
                                                    </select>
                                                    @error('street')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="address"
                                                        placeholder="Bạn có thể bổ sung địa chỉ" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Số phòng ngủ</label>
                                                    <input type="text" class="form-control" name="bedrooms" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Số phòng tắm, vệ sinh</label>
                                                    <input type="text" class="form-control" name="bathrooms" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Hướng nhà</label>
                                                    <select name="direction" class="form-control">
                                                        <option value="">Chọn hướng nhà</option>
                                                        @foreach ($directions as $direct)
                                                            <option value="{{ $direct->id }}">
                                                                {{ $direct->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-xl-1"></div>
                                                <div class="col-xl-10">
                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Loại bài đăng</label>
                                                            <select class="form-control" name="post_type" id="">
                                                                <option value="">Chọn loại bài đăng</option>
                                                                @foreach ($post_type as $post)
                                                                    <option value="{{ $post->id }}">
                                                                        {{ $post->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('post_type')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label required">Ngày bắt đầu</label>
                                                            <input class="form-control" type="date" name="start_date">
                                                            @error('start_date')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label required">Ngày kết thúc</label>
                                                            <input class="form-control" type="date" name="end_date">
                                                            @error('end_date')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-1"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">

                                            <div class="mb-3">
                                                <label class="form-label">Mô tả</label>
                                                <textarea class="form-control ckeditor" id="demo" name="description" id="" rows="5">{{ old('content') }}</textarea>
                                            </div>
                                        </div>
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
    </div>
@endsection
