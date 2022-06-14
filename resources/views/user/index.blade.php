@extends('user.layouts.layout')
@section('content')
<div role="main" class="main">
    <!-- Begin Main Slide -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="{{ asset('images/slide/slider1.jpg') }}" alt="Los Angeles" style="width:100%;">
          </div>

          <div class="item">
            <img src="{{ asset('images/slide/slider2.jpg') }}" alt="Chicago" style="width:100%;">
          </div>

          <div class="item">
            <img src="{{ asset('images/slide/slider3.jpg') }}" alt="New york" style="width:100%;">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    <!-- End Main Slide -->

    @include('user.layouts.search')

    <!-- Begin Featured -->
    <section class="pgl-featured pgl-bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 animation">
                    <div class="pgl-property featured-item">
                        <div class="property-thumb-info">
                            <div class="property-thumb-info-image">
                                <img alt="" class="img-responsive" src="{{ asset('images/property-featured-1.jpg') }}">
                            </div>
                            <div class="property-thumb-info-content">
                                <h3><a href="property-detail.html">Alpine Rd, Stockton, CA 95215</a></h3>
                                <p>Amet luctus nisl tempus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 animation">
                    <div class="pgl-property featured-item">
                        <div class="property-thumb-info">
                            <div class="property-thumb-info-image">
                                <img alt="" class="img-responsive" src="{{ asset('images/property-featured-2.jpg') }}">
                            </div>
                            <div class="property-thumb-info-content">
                                <h3><a href="property-detail.html">J St, Modesto, CA 95351</a></h3>
                                <p>Amet luctus nisl tempus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 animation">
                    <div class="pgl-property featured-item">
                        <div class="property-thumb-info">
                            <div class="property-thumb-info-image">
                                <img alt="" class="img-responsive" src="{{ asset('images/property-featured-3.jpg') }}">
                            </div>
                            <div class="property-thumb-info-content">
                                <h3><a href="property-detail.html">Spring Gate DrUNIT 4106</a></h3>
                                <p>Amet luctus nisl tempus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 animation">
                    <div class="pgl-property featured-item">
                        <div class="property-thumb-info">
                            <div class="property-thumb-info-image">
                                <img alt="" class="img-responsive" src="{{ asset('images/property-featured-4.jpg') }}">
                            </div>
                            <div class="property-thumb-info-content">
                                <h3><a href="property-detail.html">Chatham St NW, Roanoke</a></h3>
                                <p>Amet luctus nisl tempus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 animation">
                    <div class="pgl-property featured-item">
                        <div class="property-thumb-info">
                            <div class="property-thumb-info-image">
                                <img alt="" class="img-responsive" src="{{ 'images/property-featured-5.jpg' }}">
                            </div>
                            <div class="property-thumb-info-content">
                                <h3><a href="property-detail.html">Stockton, CA 95215</a></h3>
                                <p>Amet luctus nisl tempus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="top-tall">
        </div>
    </section>
    <!-- End Featured -->

    <!-- Begin Properties -->
    <section class="pgl-properties pgl-bg-grey">
        <div class="container">
            <h2>Bất động sản</h2>
            <div class="properties-full properties-listing properties-listfull">
                @foreach ($property as $item)
                <div class="pgl-property animation">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="property-thumb-info-image">
                                <img alt="" class="img-responsive" src="{{ asset($item->image) }}">
                                <span class="property-thumb-info-label">
                                    <span class="label price"> {{ $item->property_type->name }}

                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <div class="property-thumb-info">

                                <div class="property-thumb-info-content">
                                    <h3 style="font-size: 22px; font-weight: 600;"><a href="{{ route('show-property-detail', ['id_property'=>$item->id]) }}">{{ $item->name }}</a></h3>
                                    <h4>
                                        @if ($item->status === 'end')
                                            Đã hết
                                            @else
                                            Giá: {{ number_format($item->price) }} vnđ</span>
                                        @endif
                                    </h4>
                                    <address>Địa chỉ: {{ $item->street->name }}, {{ $item->street->ward->name }}, {{ $item->street->ward->district->name }}, {{ $item->street->ward->district->provinces->name }}</address>
                                    {{-- <p>Loại hình: {{ $item->property_type->name }}</p> --}}
                                    <p>{!! $item->description !!}</p>
                                </div>
                                <div class="amenities clearfix">
                                    <ul class="pull-left">
                                        <li><strong>Đăng bởi: </strong>{{ $item->account->user_info->name }}.</li>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> {{ $item->account->user_info->phone }}</li>
                                    </ul>
                                    <ul class="pull-right">
                                        <li>{{ date('d/m/Y', strtotime($item->start_date))  }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <ul class="pagination">
                    <div>{{ $property->links() }}</div>
               </ul>
            </div>
        </div>
    </section>
    <!-- End Properties -->

    <!-- Begin About -->
    <section class="pgl-about">
        <div class="container">
            <div class="row">
                <div class="col-md-4 animation about-item">
                    <h2>Chúng tôi là ai?</h2>
                    <p><img src="{{ asset('images/demo-1.jpg') }}" alt="" class="img-responsive"></p>
                    <p>Sứ mệnh của website là giúp mỗi người Việt Nam đều có một nơi để gọi là nhà và sự đổi mới này cũng đánh dấu mốc đặc biệt trong quá trình chuyển đổi mà chúng tôi đã thực hiện trong những năm qua. Ở giai đoạn mới, chúng tôi mong muốn thúc đẩy và trao quyền để người mua nhà tự tin hơn trên hành trình tìm kiếm và sở hữu ngôi nhà mơ ước của mình.</p>
                    <a href="{{ route('show-about') }}" class="btn btn-lg btn-default">Chi tiết</a>
                </div>
                <div class="col-md-4 animation about-item">
                    <h2>Tại sao chọn chúng tôi</h2>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default pgl-panel">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Dễ dàng tìm kiếm</a> </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>Trang web cung cấp đầy đủ các thông tin cần thiết giúp bạn có thể dễ dàng lựa chọn.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default pgl-panel">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">Nhiều dự án phong phú</a> </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body"> <p>Bao gồn nhiều các dự án bất động sản bán hoặc cho thuê.</p> </div>
                            </div>
                        </div>
                        <div class="panel panel-default pgl-panel">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">Đáng tin cậy</a> </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Web site đảm đảm bảo an toàn về các thông tin của khách hàng</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default pgl-panel">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFouth" class="collapsed">Giao dịch nhanh chóng</a> </h4>
                            </div>
                            <div id="collapseFouth" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Chi phí đăng bài hợp lý. Thanh toán nhanh chóng.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animation about-item">
                    <h2>Sứ mệnh</h2>
                    <div class="owl-carousel pgl-bg-dark pgl-testimonial" data-plugin-options='{"items": 1, "pagination": false, "autoHeight": true}'>
                        <div class="col-md-12">
                            <div class="testimonial-author">
                                {{-- <div class="img-thumbnail-small img-circle">
                                    <img src="images/agents/agent-1.jpg" class="img-circle" alt="Andrew MCCarthy">
                                </div> --}}
                                <h4>Nguyễn Khắc Hiếu</h4>
                                <p><strong>Quản trị viên</strong></p>
                            </div>
                            <div class="divider-quote-sign"><span>“</span></div>
                            <blockquote class="testimonial">
                                <p>Giúp mỗi người Việt Nam đều có một nơi để gọi là nhà và sự đổi mới này cũng đánh dấu mốc đặc biệt trong quá trình chuyển đổi mà chúng tôi đã thực hiện trong những năm qua. Ở giai đoạn mới, chúng tôi mong muốn thúc đẩy và trao quyền để người mua nhà tự tin hơn trên hành trình tìm kiếm và sở hữu ngôi nhà mơ ước của mình.</p>
                            </blockquote>
                        </div>
                        <div class="col-md-12">
                            <div class="testimonial-author">
                                {{-- <div class="img-thumbnail-small img-circle">
                                    <img src="images/agents/agent-1.jpg" class="img-circle" alt="Andrew MCCarthy">
                                </div> --}}
                                <h4>Nguyễn Khắc Hiếu</h4>
                                <p><strong>Quản trị viên</strong></p>
                            </div>
                            <div class="divider-quote-sign"><span>“</span></div>
                            <blockquote class="testimonial">
                                <p>Giúp mỗi người Việt Nam đều có một nơi để gọi là nhà và sự đổi mới này cũng đánh dấu mốc đặc biệt trong quá trình chuyển đổi mà chúng tôi đã thực hiện trong những năm qua. Ở giai đoạn mới, chúng tôi mong muốn thúc đẩy và trao quyền để người mua nhà tự tin hơn trên hành trình tìm kiếm và sở hữu ngôi nhà mơ ước của mình.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About -->

</div>
@endsection
