@extends('user.layouts.layout')
@section('content')
<div role="main" class="main pgl-bg-grey">
    <section class="pgl-intro">
        <div class="container">
            <h2>Chào mừng bạn đến với RealEstast</h2>
            <div class="owl-carousel pgl-pro-slide pgl-img-slide" data-plugin-options='{"items": 1, "pagination": false, "autoHeight": true}'>
                <div class="item-wrap">
                    <img src="{{ asset('images/slide/slider1.jpg') }}" alt="Photo" class="img-responsive">
                    <div class="item-caption"><p>Nhà là nơi chúng ta tìm về khi mệt mỏi.</p></div>
                </div>
                <div class="item-wrap">
                    <img src="{{ asset('images/slide/slider2.jpg') }}" alt="Photo" class="img-responsive">
                    <div class="item-caption"><p>Nhà là nơi chúng ta tìm về khi mệt mỏi.</p></div>
                </div>
                <div class="item-wrap">
                    <img src="{{ asset('images/slide/slider3.jpg') }}" alt="Photo" class="img-responsive">
                    <div class="item-caption"><p>Nhà là nơi chúng ta tìm về khi mệt mỏi.</p></div>
                </div>
            </div>
            <div class="lead pgl-bg-light text-center">
                <p>Sứ mệnh của website là giúp mỗi người Việt Nam đều có một nơi để gọi là nhà và sự đổi mới này cũng đánh dấu mốc đặc biệt trong quá trình chuyển đổi mà chúng tôi đã thực hiện trong những năm qua. Ở giai đoạn mới, chúng tôi mong muốn thúc đẩy và trao quyền để người mua nhà tự tin hơn trên hành trình tìm kiếm và sở hữu ngôi nhà mơ ước của mình.</p>
            </div>
        </div>
    </section>

    <!-- Begin About -->
    <section class="pgl-offer">
        <div class="container">
            <h2>Chung tôi cung cấp</h2>
            <div class="row">
                <div class="col-md-4 animation">
                    <div class="offer-item pgl-bg-light">
                        <div class="offer-item-inner">
                            <p><i class="icons icon-hand"></i></p>
                            <h3>Dịch vụ mô giới</h3>
                            <p>Perspiciatis unde omnisiste natus error voluptatem remopa accusantium doloremque laudantium, totam rem.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animation">
                    <div class="offer-item pgl-bg-light">
                        <div class="offer-item-inner">
                            <p><i class="icons icon-home"></i></p>
                            <h3>Quản lý bất động sản</h3>
                            <p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium doloremque laudantium</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animation">
                    <div class="offer-item pgl-bg-light">
                        <div class="offer-item-inner">
                            <p><i class="icons icon-chart"></i></p>
                            <h3>Xây dựng &amp; Phát triển</h3>
                            <p>Unde omnisiste natus error voluptatem remopa accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About -->

    <!-- Begin testimonial -->
    <section class="pgl-teams">
        <div class="container">
            <h2>Đội ngũ của chúng tôi</h2>
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="pgl-team-item pgl-bg-light">

                        <div class="img-thumbnail-medium">
                            <a href="#"><img src="{{ asset('images/avata.jpg') }}" class="img-responsive" alt=""></a>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                        <div class="pgl-team-info">
                            <h4>Nguyễn Khắc Hiếu</h4>
                            <p class="text-muted">Giám đốc</p>
                            <p>Thành công sẽ không đến nếu chúng chúng ta không cố gắng.</p>
                            {{-- <a href="#">View profile</a> --}}
                        </div>

                    </div>
                </div>

                <div class="col-xs-6 col-md-3">
                    <div class="pgl-team-item pgl-bg-light">

                        <div class="img-thumbnail-medium">
                            <a href="#"><img src="{{ asset('images/avata.jpg') }}" class="img-responsive" alt=""></a>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                        <div class="pgl-team-info">
                            <h4>Nguyễn Khắc Hiếu</h4>
                            <p class="text-muted">Giám đốc</p>
                            <p>Thành công sẽ không đến nếu chúng chúng ta không cố gắng.</p>
                            {{-- <a href="#">View profile</a> --}}
                        </div>

                    </div>
                </div>

                <div class="col-xs-6 col-md-3">
                    <div class="pgl-team-item pgl-bg-light">

                        <div class="img-thumbnail-medium">
                            <a href="#"><img src="{{ asset('images/avata.jpg') }}" class="img-responsive" alt=""></a>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                        <div class="pgl-team-info">
                            <h4>Nguyễn Khắc Hiếu</h4>
                            <p class="text-muted">Giám đốc</p>
                            <p>Thành công sẽ không đến nếu chúng chúng ta không cố gắng.</p>
                            {{-- <a href="#">View profile</a> --}}
                        </div>

                    </div>
                </div>

                <div class="col-xs-6 col-md-3">
                    <div class="pgl-team-item pgl-bg-light">

                        <div class="img-thumbnail-medium">
                            <a href="#"><img src="{{ asset('images/avata.jpg') }}" class="img-responsive" alt=""></a>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                        <div class="pgl-team-info">
                            <h4>Nguyễn Khắc Hiếu</h4>
                            <p class="text-muted">Giám đốc</p>
                            <p>Thành công sẽ không đến nếu chúng chúng ta không cố gắng.</p>
                            {{-- <a href="#">View profile</a> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial -->

</div>
@endsection
