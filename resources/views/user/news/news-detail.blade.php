@extends('user.layouts.layout')
{{-- @section('title')
    <title>Tin tức | Nội thất Funibuy</title>
@endsection --}}
@section('content')
<div role="main" class="main pgl-bg-grey">
    <section class="page-top">
        <div class="container">
            <div class="page-top-in">
                <h2><span>List rows</span></h2>
            </div>
        </div>
    </section>
    <section class="pgl-properties pgl-bg-grey">
        <div class="container">
            <h2 style="font-size: 18px">{{ $news_detail->title }}</h2>
            {{-- <div class="mapping">
                <span><a href="{{ route('TrangChu') }}"><i class="fa fa-home"></i> Trang chủ</a></span> /
                <span><a href="{{ route('pages.baiviet') }}">Tin tức</a></span> /
                <span><a
                        href="{{ route('pages.gioithieu', ['id' => $post_detail->id]) }}">{{ $post_detail->tieu_de }}</a></span>
            </div> --}}
            <div class="main">
                <div class="grid wide">
                    <div class="introduce-title">
                        <h3>{{ $news_detail->title }}</h3>
                    </div>
                    <div class="introduce-content">
                        <img style="margin: 20px 0px" src="{{ asset($news_detail->image) }}" alt="">
                        <p>{!! $news_detail->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
