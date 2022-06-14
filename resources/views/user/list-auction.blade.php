@extends('user.layouts.layout')
@section('content')
    <div role="main" class="main pgl-bg-grey">
        <!-- Begin page top -->
        <section class="page-top">
            <div class="container">
                <div class="page-top-in">
                    <h2><span>List rows</span></h2>
                </div>
            </div>
        </section>
        <!-- End page top -->

        @include('user.layouts.search')

        <!-- Begin Properties -->

        <section class="pgl-properties pgl-bg-grey">
            <div class="container">
                <h2>Bất động sản</h2>
                @if (empty($property[0]))
                    <h3>Hiện tại chưa có dự án đấu giá nào</h3>
                @else
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
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
                                                <h3 style="font-size: 22px; font-weight: 600;"><a
                                                        href="property-detail.html">{{ $item->name }}</a></h3>
                                                <h4>
                                                    @if ($item->status === 'end')
                                                        Đã hết
                                                    @else
                                                        Giá khởi điểm: {{ number_format($item->price) }} vnđ</span>
                                                    @endif
                                                </h4>
                                                <address>Địa chỉ: {{ $item->street->name }},
                                                    {{ $item->street->ward->name }},
                                                    {{ $item->street->ward->district->name }},
                                                    {{ $item->street->ward->district->provinces->name }}</address>
                                                {{-- <p>Loại hình: {{ $item->property_type->name }}</p> --}}
                                                <p>{!! $item->description !!}</p>
                                            </div>
                                            <div class="amenities clearfix">
                                                <ul>
                                                    @if (isset($max_price))
                                                    <li><strong>Giá cao nhất: </strong>
                                                        {{ number_format($max_price->price) }} vnđ</li>
                                                        <li>({{ $max_price->auctioneer_profile->name }})</li>
                                                    @else
                                                    <li><strong>Giá cao nhất: </strong> {{ number_format($item->price) }} vnđ</li>
                                                    @endif
                                                </ul>
                                                <ul class="pull-left">
                                                    <li><strong>Ngày kết thúc:
                                                        </strong>{{ date('d/m/Y', strtotime($item->end_date)) }}</li>
                                                </ul>

                                                @if ($item->end_date >= $date)
                                                <ul class="pull-right">
                                                    <a style="height: 25px; padding: 2px 12px;"
                                                        class="btn btn-success btn-xs btn-send" href=""
                                                        data-url="{{ route('show-auction-property', ['id_property' => $item->id]) }}"
                                                        ​> Tham gia đấu giá</a>
                                                </ul>
                                                @else
                                                <ul class="pull-right">
                                                    Đã hết thời gian tham gia
                                                </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <ul class="pagination">
                            {{-- <div>{{ $property->links() }}</div> --}}
                        </ul>
                    </div>
                @endif
            </div>
        </section>
        @extends('user.modal-auction')
        <!-- End Properties -->

    </div>
@endsection
{{-- @section('script')
    <script>
        $('.btn-send').click(function(e) {
            var url = $(this).attr('data-url');
            $('#modal-auction').modal('show');
            e.preventDefault();
            $.ajax({
                url: url,
                type: 'get',
                success: function(response) {
                    $('#form-auction').attr('action', '{{ asset('home/auction/property/') }}/' + response.data.id)
                },
                error: function(error) {
                }
            })
        })
    </script>
@endsection --}}
