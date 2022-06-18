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
                {{-- <div class="mapping">
            <span><a href="{{ route('TrangChu') }}"><i class="fa fa-home"></i> Trang chủ</a></span> /
            <span><a href="{{ route('pages.baiviet') }}">Tin tức</a></span>
        </div> --}}
                <div class="main">
                    <div class="grid wide">
                        <div class="contact-title">
                            <h3>TIN TỨC </h3>
                        </div>
                        <div class="contact-content">
                            {{-- <div class="col-sm-3" style="background-color: #ccc; height:150px"></div> --}}
                            <div>
                                <div class="row-post">
                                    @foreach ($news as $item)
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{ route('new-detail', ['id_news'=>$item->id]) }}">
                                                    <img src="{{ asset($item->image) }}" alt="Lights"
                                                        style="width:100%">
                                                    <div class="caption">
                                                        <b>{{ $item->title }}</b>
                                                    </div>
                                                    <div class="caption detail">Xem chi tiết</div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
