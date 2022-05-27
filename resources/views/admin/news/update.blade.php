@extends('admin.layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-12">
                        <form action="" method="post" class="card" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Thêm mới tin tức</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-1"></div>
                                    <div class="col-xl-10">
                                        <div class="row">
                                            @if (session('message'))
                                                <div class="alert alert-success">
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                            <div class="mb-3">
                                                <label class="form-label required">Tiêu đề</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ $news->title }}" />
                                                @error('title')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Hình ảnh</label>
                                                <input type="file" name="images" id="image" style="margin-bottom: 15px" />
                                                <br>
                                                <span>Xem trước :</span>
                                                <img id="blah" src="{{ asset($news->image) }}" width="300px"
                                                    height="150px" alt="">
                                                @error('images')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Nội dung</label>
                                                <textarea class="form-control ckeditor" id="demo" name="content" id="" rows="8">{!! $news->content !!}</textarea>
                                                @error('content')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-1"></div>
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
@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endsection
