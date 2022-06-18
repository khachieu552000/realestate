@extends('user.layouts.layout')
@section('content')
    <div role="main" class="main pgl-bg-grey">
        <!-- Begin page top -->
        <section class="page-top">
            <div class="container">
                <div class="page-top-in">
                    <h2><span>Property Detail</span></h2>
                </div>
            </div>
        </section>
        <!-- End page top -->

        <!-- Begin content with sidebar -->
        <div class="container">
            <div class="row">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="col-md-9 content">
                    <section class="pgl-pro-detail pgl-bg-light">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="{{ asset($property->image) }}" alt="">
                                    <span class="property-thumb-info-label">
                                        <span class="label price">{{ number_format($property->price) }} vnđ</span>
                                        <span class="label forrent">{{ $property->property_type->name }}</span>
                                    </span>
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                <li> <img src="{{ asset('images/property-detail-1.jpg') }}" width="" alt=""></li>
                                <li> <img src="{{ asset('images/property-detail-2.jpg') }}" alt=""></li>
                                <li> <img src="{{ asset('images/property-detail-3.jpg') }}" alt=""></li>
                                <li> <img src="{{ asset('images/property-detail-4.jpg') }}" alt=""></li>
                                <li> <img src="{{ asset('images/property-detail-5.jpg') }}" alt=""></li>
                                <li> <img src="{{ asset('images/property-detail-6.jpg') }}" alt=""></li>
                                <li> <img src="{{ asset('images/property-detail-7.jpg') }}" alt=""></li>
                                <li> <img src="{{ asset('images/property-detail-8.jpg') }}" alt=""></li>
                            </ul>
                        </div>
                        <div class="pgl-detail">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>{{ $property->name }}</h2>
                                    <p>
                                        <strong>
                                            Địa chỉ: {{ $property->street->name }},
                                            {{ $property->street->ward->name }},
                                            {{ $property->street->ward->district->name }},
                                            {{ $property->street->ward->district->provinces->name }}
                                        </strong>
                                    </p>
                                    <p>{!! $property->description !!}</p>
                                </div>
                                <div class="col-sm-12">
                                    <h3>Đặc điểm bất động sản</h3>
                                    <ul class="list-unstyled amenities amenities-detail" style="line-height: 2.0">
                                        <li><strong>Loại hình: </strong>{{ $property->categories->name }}</li>
                                        <li><strong>Diện tích:</strong> {{ $property->acreage }}<sup>m2</sup></li>
                                        <li><i class="icons icon-bedroom"></i>
                                            <strong>Số phòng ngủ: </strong> {{ $property->bedrooms }} phòng
                                        </li>
                                        <li><i class="icons icon-bathroom"></i>
                                            <strong>Số phòng tắm: </strong> {{ $property->bathrooms }} phòng
                                        </li>
                                        <li><i class="icons icon-bathroom"></i>
                                            <strong>Hướng nhà: </strong> {{ $property->directions->name }}
                                        </li>
                                        <li><i class="icons icon-bathroom"></i>
                                            <strong>Giấy tờ pháp lý: </strong> {{ $property->juridical }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            {{-- <div class="tab-detail">
                                <h3>Thông tin bổ sung</h3>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default pgl-panel">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseTwo" class="collapsed">Video</a> </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium
                                                    doloremque laudantium, totam rem aperiam.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default pgl-panel">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseThree" class="collapsed">Map</a> </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium
                                                    doloremque laudantium, totam rem aperiam.</p>
                                                <div id="contact-map" class="pgl-bg-light"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default pgl-panel">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseFive" class="collapsed">Liên hệ quản trị viên</a> </h4>
                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium
                                                    doloremque laudantium, totam rem aperiam.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </section>

                    <!-- Begin Related properties -->
                    <section class="pgl-properties">
                        <h2>Related Properties</h2>
                        <div class="row">
                            <div class="owl-carousel pgl-pro-slide"
                                data-plugin-options='{"items": 3, "itemsDesktop": 3, "singleItem": false, "autoPlay": false, "pagination": false}'>
                                @foreach ($similar_property as $sp)
                                <div class="col-md-12 animation">
                                    <div class="pgl-property">
                                        <div class="property-thumb-info">
                                            <div class="property-thumb-info-image">
                                                <img alt="" class="img-responsive" src="{{ asset($sp->image) }}">
                                                <span class="property-thumb-info-label">
                                                    <span class="label price">{{ number_format($sp->price) }} vnđ</span>
                                                    <span class="label forrent">{{ $sp->property_type->name }}</span>
                                                </span>
                                            </div>
                                            <div class="property-thumb-info-content">
                                                <h3><a href="property-detail.html">{{ $sp->name }}</a></h3>
                                                <address>{{ $sp->street->name }}, {{ $sp->street->ward->name }}, {{ $sp->street->ward->district->name }}, {{ $sp->street->ward->district->provinces->name }}</address>
                                            </div>
                                            <div class="amenities clearfix">
                                                <ul class="pull-left">
                                                    <li><strong>Diện tích</strong> {{ $sp->acreage }}<sup>m2</sup></li>
                                                </ul>
                                                <ul class="pull-right">
                                                    <li><i class="icons icon-bedroom"></i> {{ $sp->bedrooms }}</li>
                                                    <li><i class="icons icon-bathroom"></i> {{ $sp->bathrooms }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </section>
                    <!-- End Related properties -->

                </div>
                <div class="col-md-3 sidebar">
                    <!-- Begin Advanced Search -->
                    <aside class="block pgl-advanced-search pgl-bg-light">
                        <h3>Tìm kiếm</h3>
                        <form action="{{ route('search') }}" method="GET" name="advancedsearch">
                            @csrf
                            <div class="form-group">
                                <label class="sr-only" for="property-status">Tỉnh/Thành phố</label>
                                <select class="form-control choose provinces" name="provinces" id="provinces">
                                    <option value="">Chọn tỉnh/Thành phố</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">
                                            {{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="property-status">Quận/Huyện</label>
                                <select class="form-control district choose" name="district" id="district">
                                    <option value="">Chọn quận/huyện</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="property-status">Phường/Xã</label>
                            <select class="form-control ward choose" name="ward" id="ward">
                                <option value="">Chọn phường/xã</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="property-status">Đường/Phố</label>
                            <select class="form-control" name="street" id="street">
                                <option value="">Chọn đường/phố</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="search-category">Danh mục</label>
                                <select id="search-category" name="category" data-placeholder="Category"
                                    class="chosen-select">
                                    <option selected="selected" value="0">Danh mục</option>
                                    @foreach ($category as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="search-property_type">Hình thức</label>
                                <select id="search-property_type" name="property_type" data-placeholder="property_type"
                                    class="chosen-select">
                                    <option selected="selected" value="0">Hình thức</option>
                                    @foreach ($property_type_all as $pt)
                                    <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="row pgl-narrow-row">
                                        <div class="col-xs-6">
                                            <label class="sr-only" for="search-acreage">Diện tích</label>
                                            <select id="search-acreage" name="acreage" data-placeholder="acreage"
                                                class="chosen-select">
                                                <option selected="selected" value="0">Diện tích</option>
                                                <option value="100"><= 100 <sup>m2</sup></option>
                                                <option value="101">100 - 200 <sup>m2</sup></option>
                                                <option value="201">200 - 500 <sup>m2</sup></option>
                                                <option value="501">> 500 <sup>m2</sup></option>

                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="sr-only" for="search-price">Mức giá</label>
                                            <select id="search-price" name="price" data-placeholder="Price"
                                                class="chosen-select">
                                                <option selected="selected" value="0">Mức giá</option>
                                                <option value="1000000000"><= 1 tỷ</option>
                                                <option value="1000000001">1 - 3 tỷ</option>
                                                <option value="3000000001">3 - 7 tỷ</option>
                                                <option value="7000000001">7 - 10 tỷ</option>
                                                <option value="10000000001">10 - 20 tỷ</option>
                                                <option value="20000000001">> 20 tỷ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Tìm kiếm</button>
                            </div>

                        </form>
                    </aside>
                    <!-- End Advanced Search -->

                    <!-- Begin Our Agents -->
                    <aside class="block pgl-agents pgl-bg-light">
                        <h3>Thông tin người đăng</h3>
                            <div class="pgl-agent-item">
                                <div class="pgl-agent-info">
                                    <h4><a href="agentprofile.html">{{ $property->account->user_info->name }}</a></h4>
                                    <address>
                                        <i class="fa fa-map-marker"></i> {{ $property->account->user_info->address }}<br>
                                        <i class="fa fa-phone"></i> Điện thoại: {{ $property->account->user_info->phone }}<br>
                                        <a style="height: 25px; padding: 2px 12px;"
                                        class="btn btn-default btn-contact" href=""
                                        data-url="{{ route('show-customer-contact', ['id_property' => $property->id]) }}"
                                        ​> Yêu cầu liên hệ lại</a>
                                    </address>
                                </div>
                            </div>
                    </aside>
                    @if($property->property_type->name === 'Đấu giá')
                    <aside class="block pgl-agents pgl-bg-light">
                        <h3>Thông tin đấu giá</h3>
                            <div class="pgl-agent-item">
                                <div class="pgl-agent-info">
                                    <p> <b>Giá khởi điểm:</b> {{ number_format($property->price) }} vnđ</p>
                                    <address>
                                        @if (isset($max_price))
                                        <b>Giá cao nhất hiện tại:</b> {{ number_format($max_price->price) }} vnđ <br>
                                        ({{ $max_price->auctioneer_profile->name }}) <br>
                                        @else
                                        <b>Giá cao nhất hiện tại:</b> {{ number_format($property->price) }}
                                        @endif
                                        <br>
                                        <b>Ngày kết thúc</b> {{ date('d/m/Y', strtotime($property->end_date)) }}<br>
                                        @if ($property->end_date >= $date)
                                                    <a style="height: 25px; padding: 2px 12px;"
                                                        class="btn btn-default btn-xs btn-send" href=""
                                                        data-url="{{ route('show-auction-property', ['id_property' => $property->id]) }}"
                                                        ​> Tham gia đấu giá</a>
                                                @else
                                                    Đã hết thời gian tham gia
                                                @endif
                                    </address>
                                </div>
                            </div>
                    </aside>
                    @endif
                    <!-- End Our Agents -->
                </div>
            </div>
        </div>
        @include('user.modal-auction')
        <!-- End content with sidebar -->
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.choose').on('change', function() {
            var action = $(this).attr('id');
            var id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            // alert(id);
            // alert(_token);
            if (action == 'provinces') {
                result = 'district';
            } else if (action == 'district') {
                result = 'ward';
            } else {
                result = 'street';
            }
            $.ajax({
                url: '{{ url('/select-location') }}',
                method: 'POST',
                data: {
                    action: action,
                    id: id,
                    _token: _token
                },
                success: function(data) {
                    $('#' + result).html(data);
                }
            });
        });
    })
</script>
@endsection
