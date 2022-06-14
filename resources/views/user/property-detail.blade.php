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
                                    {{-- </li>
                            <li>
                                <img src="{{ asset('images/property-detail-2.jpg') }}" alt="">
                                <span class="property-thumb-info-label">
                                    <span class="label price">$358,000</span>
                                </span>
                            </li>
                            <li>
                                <img src="{{ asset('images/property-detail-3.jpg') }}" alt="">
                                <span class="property-thumb-info-label">
                                    <span class="label price">$358,000</span>
                                    <span class="label forrent">Rent</span>
                                </span>
                            </li>
                            <li>
                                <img src="{{ asset('images/property-detail-4.jpg') }}" alt="">
                                <span class="property-thumb-info-label">
                                    <span class="label price">$358,000</span>
                                </span>
                            </li>
                            <li>
                                <img src="{{ asset('images/property-detail-5.jpg') }}" alt="">
                                <span class="property-thumb-info-label">
                                    <span class="label price">$358,000</span>
                                </span>
                            </li>
                            <li>
                                <img src="{{ asset('images/property-detail-6.jpg') }}" alt="">
                                <span class="property-thumb-info-label">
                                    <span class="label price">$358,000</span>
                                    <span class="label forrent">Rent</span>
                                </span>
                            </li>
                            <li>
                                <img src="{{ asset('images/property-detail-7.jpg') }}" alt="">
                                <span class="property-thumb-info-label">
                                    <span class="label price">$358,000</span>
                                </span>
                            </li>
                            <li>
                                <img src="{{ asset('images/property-detail-8.jpg') }}" alt="">
                                <span class="property-thumb-info-label">
                                    <span class="label price">$358,000</span>
                                    <span class="label forrent">Rent</span>
                                </span>
                            </li> --}}
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

                            <div class="tab-detail">
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
                            </div>
                        </div>
                    </section>

                    <!-- Begin Related properties -->
                    <section class="pgl-properties">
                        <h2>Related Properties</h2>
                        <div class="row">
                            <div class="owl-carousel pgl-pro-slide"
                                data-plugin-options='{"items": 3, "itemsDesktop": 3, "singleItem": false, "autoPlay": false, "pagination": false}'>
                                <div class="col-md-12 animation">
                                    <div class="pgl-property">
                                        <div class="property-thumb-info">
                                            <div class="property-thumb-info-image">
                                                <img alt="" class="img-responsive" src="images/properties/property-1.jpg">
                                                <span class="property-thumb-info-label">
                                                    <span class="label price">$358,000</span>
                                                    <span class="label forrent">Rent</span>
                                                </span>
                                            </div>
                                            <div class="property-thumb-info-content">
                                                <h3><a href="property-detail.html">Poolside character home on a wide
                                                        422sqm</a></h3>
                                                <address>Ferris Park, Jersey City Land in Sales</address>
                                            </div>
                                            <div class="amenities clearfix">
                                                <ul class="pull-left">
                                                    <li><strong>Area:</strong> 450<sup>m2</sup></li>
                                                </ul>
                                                <ul class="pull-right">
                                                    <li><i class="icons icon-bedroom"></i> 3</li>
                                                    <li><i class="icons icon-bathroom"></i> 2</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 animation">
                                    <div class="pgl-property">
                                        <div class="property-thumb-info">
                                            <div class="property-thumb-info-image">
                                                <img alt="" class="img-responsive" src="images/properties/property-2.jpg">
                                                <span class="property-thumb-info-label">
                                                    <span class="label price">$358,000</span>
                                                    <span class="label forrent">Rent</span>
                                                </span>
                                            </div>
                                            <div class="property-thumb-info-content">
                                                <h3><a href="property-detail.html">Poolside character home on a wide
                                                        422sqm</a></h3>
                                                <address>Ferris Park, Jersey City Land in Sales</address>
                                            </div>
                                            <div class="amenities clearfix">
                                                <ul class="pull-left">
                                                    <li><strong>Area:</strong> 450<sup>m2</sup></li>
                                                </ul>
                                                <ul class="pull-right">
                                                    <li><i class="icons icon-bedroom"></i> 3</li>
                                                    <li><i class="icons icon-bathroom"></i> 2</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 animation">
                                    <div class="pgl-property">
                                        <div class="property-thumb-info">
                                            <div class="property-thumb-info-image">
                                                <img alt="" class="img-responsive" src="images/properties/property-3.jpg">
                                                <span class="property-thumb-info-label">
                                                    <span class="label price">$358,000</span>
                                                    <span class="label forrent">Rent</span>
                                                </span>
                                            </div>
                                            <div class="property-thumb-info-content">
                                                <h3><a href="property-detail.html">Poolside character home on a wide
                                                        422sqm</a></h3>
                                                <address>Ferris Park, Jersey City Land in Sales</address>
                                            </div>
                                            <div class="amenities clearfix">
                                                <ul class="pull-left">
                                                    <li><strong>Area:</strong> 450<sup>m2</sup></li>
                                                </ul>
                                                <ul class="pull-right">
                                                    <li><i class="icons icon-bedroom"></i> 3</li>
                                                    <li><i class="icons icon-bathroom"></i> 2</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 animation">
                                    <div class="pgl-property">
                                        <div class="property-thumb-info">
                                            <div class="property-thumb-info-image">
                                                <img alt="" class="img-responsive" src="images/properties/property-4.jpg">
                                                <span class="property-thumb-info-label">
                                                    <span class="label price">$358,000</span>
                                                    <span class="label forrent">Rent</span>
                                                </span>
                                            </div>
                                            <div class="property-thumb-info-content">
                                                <h3><a href="property-detail.html">Poolside character home on a wide
                                                        422sqm</a></h3>
                                                <address>Ferris Park, Jersey City Land in Sales</address>
                                            </div>
                                            <div class="amenities clearfix">
                                                <ul class="pull-left">
                                                    <li><strong>Area:</strong> 450<sup>m2</sup></li>
                                                </ul>
                                                <ul class="pull-right">
                                                    <li><i class="icons icon-bedroom"></i> 3</li>
                                                    <li><i class="icons icon-bathroom"></i> 2</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Related properties -->

                </div>
                <div class="col-md-3 sidebar">
                    <!-- Begin Advanced Search -->
                    <aside class="block pgl-advanced-search pgl-bg-light">
                        <h3>Tìm kiếm</h3>
                        <form name="advancedsearch">
                            <div class="form-group">
                                <label class="sr-only" for="property-status">Tỉnh/Thành phố</label>
                                <select id="property-status" name="property-status" data-placeholder="Property Status" class="chosen-select">
                                    <option selected="selected" value="Property Status">Tỉnh/Thành phố</option>
                                    <option value="sale">For Sale</option>
                                    <option value="rent">For Rent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="location">Quận Huyện</label>
                                <select id="location" name="location" data-placeholder="Location" class="chosen-select">
                                    <option selected="selected" value="Location">Quận/Huyện</option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Aland Islands">Aland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="property-types">Phường/Xã</label>
                                <select id="property-types" name="property-types" data-placeholder="Property Types" class="chosen-select">
                                    <option selected="selected" value="Property Types">Phường/Xã</option>
                                    <option value="residential">Residential</option>
                                    <option value="commercial">Commercial</option>
                                    <option value="land">Land</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="area-from">Đường/Phố</label>
                                <select id="area-from" name="area-from" data-placeholder="Area From" class="chosen-select">
                                    <option selected="selected" value="Area From">Đường/Phố</option>
                                    <option value="450">450</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="search-bedrooms">Danh mục</label>
                                <select id="search-bedrooms" name="search-bedrooms" data-placeholder="Bedrooms" class="chosen-select">
                                    <option selected="selected" value="Bedrooms">Danh mục bất động sản</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="5plus">5+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="search-bathrooms">Loại hình bất động sản</label>
                                <select id="search-bathrooms" name="search-bathrooms" data-placeholder="Bathrooms" class="chosen-select">
                                    <option selected="selected" value="Bathrooms">Loại hình bất động sản</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4plus">4+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row pgl-narrow-row">
                                    <div class="col-xs-6">
                                        <label class="sr-only" for="search-minprice">Diện tích</label>
                                        <select id="search-minprice" name="search-minprice" data-placeholder="Price From" class="chosen-select">
                                            <option selected="selected" value="Price From">Diện tích</option>
                                            <option value="0">$0</option>
                                            <option value="25000">$25000</option>
                                            <option value="50000">$50000</option>
                                            <option value="75000">$75000</option>
                                            <option value="100000">$100000</option>
                                            <option value="150000">$150000</option>
                                            <option value="200000">$200000</option>
                                            <option value="300000">$300000</option>
                                            <option value="500000">$500000</option>
                                            <option value="750000">$750000</option>
                                            <option value="1000000">$1000000</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="sr-only" for="search-maxprice">Mức giá</label>
                                        <select id="search-maxprice" name="search-maxprice" data-placeholder="Price To" class="chosen-select">
                                            <option selected="selected" value="Price To">Mức giá</option>
                                            <option value="25000">$25000</option>
                                            <option value="50000">$50000</option>
                                            <option value="75000">$75000</option>
                                            <option value="100000">$100000</option>
                                            <option value="150000">$150000</option>
                                            <option value="200000">$200000</option>
                                            <option value="300000">$300000</option>
                                            <option value="500000">$500000</option>
                                            <option value="750000">$750000</option>
                                            <option value="1000000">$1000000</option>
                                            <option value="1000000plus">>$1000000</option>
                                        </select>
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
                                <div class="img-thumbnail-medium">
                                    <a href="agentprofile.html"><img src="images/agents/temp-agent.png"
                                            class="img-responsive" alt=""></a>
                                </div>
                                <div class="pgl-agent-info">
                                    <h4><a href="agentprofile.html">{{ $property->account->user_info->name }}</a></h4>
                                    <address>
                                        <i class="fa fa-map-marker"></i> {{ $property->account->user_info->address }}<br>
                                        <i class="fa fa-phone"></i> Điện thoại: {{ $property->account->user_info->phone }}<br>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-contact" style="margin-top: 10px" href="">Yêu cầu liên hệ lại</button>
                                    </address>
                                </div>
                            </div>
                    </aside>
                    <!-- End Our Agents -->
                </div>
            </div>
        </div>
        <!-- End content with sidebar -->
    </div>
@endsection
