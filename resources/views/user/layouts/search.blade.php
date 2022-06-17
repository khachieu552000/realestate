    <!-- Begin Advanced Search -->
    <section class="pgl-advanced-search pgl-bg-light">
        <div class="container">
            <form action="{{ route('search') }}" method="get" name="advancedsearch">
                @csrf
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
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
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <label class="sr-only" for="property-status">Quận/Huyện</label>
                            <select class="form-control district choose" name="district" id="district">
                                <option value="">Chọn quận/huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <label class="sr-only" for="property-status">Phường/Xã</label>
                            <select class="form-control ward choose" name="ward" id="ward">
                                <option value="">Chọn phường/xã</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <label class="sr-only" for="property-status">Đường/Phố</label>
                            <select class="form-control" name="street" id="street">
                                <option value="">Chọn đường/phố</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-3">
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
                    </div>
                    <div class="col-xs-6 col-sm-3">
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
                    </div>
                    <div class="col-xs-6 col-sm-3">
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
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- End Advanced Search -->
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
