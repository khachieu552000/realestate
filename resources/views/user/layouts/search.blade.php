    <!-- Begin Advanced Search -->
    <section class="pgl-advanced-search pgl-bg-light">
        <div class="container">
            <form name="advancedsearch">

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
                            <label class="sr-only" for="search-bedrooms">Danh mục</label>
                            <select id="search-bedrooms" name="search-bedrooms" data-placeholder="Bedrooms"
                                class="chosen-select">
                                <option selected="selected" value="Bedrooms">Danh mục</option>
                                @foreach ($category as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <label class="sr-only" for="search-bathrooms">Hình thức</label>
                            <select id="search-bathrooms" name="search-bathrooms" data-placeholder="Bathrooms"
                                class="chosen-select">
                                <option selected="selected" value="Bathrooms">Hình thức</option>
                                @foreach ($property_type as $pt)
                                <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <div class="row pgl-narrow-row">
                                <div class="col-xs-6">
                                    <label class="sr-only" for="search-minprice">Diện tích</label>
                                    <select id="search-minprice" name="search-minprice" data-placeholder="Price From"
                                        class="chosen-select">
                                        <option selected="selected" value="Price From">Diện tích</option>
                                        <option value="30"> <= 30 <sup>m2</sup></option>
                                        <option value="31">30 - 50 <sup>m2</sup></option>
                                        <option value="51">50 - 100 <sup>m2</sup></option>
                                        <option value="101">100 - 150 <sup>m2</sup></option>
                                        <option value="151">150 - 200 <sup>m2</sup></option>
                                        <option value="201">200 - 250 <sup>m2</sup></option>
                                        <option value="251">250 - 300 <sup>m2</sup></option>
                                        <option value="301">300 - 500 <sup>m2</sup></option>
                                        <option value="501">> 500 <sup>m2</sup></option>

                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label class="sr-only" for="search-maxprice">Mức giá</label>
                                    <select id="search-maxprice" name="search-maxprice" data-placeholder="Price To"
                                        class="chosen-select">
                                        <option selected="selected" value="Price To">Mức giá</option>
                                        <option value="500"> <= 500 triệu</option>
                                        <option value="501">500 triệu - 1 tỷ</option>
                                        <option value="1">1 - 2 tỷ</option>
                                        <option value="2">2 - 3 tỷ</option>
                                        <option value="3">3 - 5 tỷ</option>
                                        <option value="5">5 - 7 tỷ</option>
                                        <option value="7">7 - 10 tỷ</option>
                                        <option value="10">10 - 20 tỷ</option>
                                        <option value="20">20 - 30 tỷ</option>
                                        <option value="30">> 30 tỷ</option>
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
