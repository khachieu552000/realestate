    <!-- Begin Advanced Search -->
    <section class="pgl-advanced-search pgl-bg-light">
        <div class="container">
            <form name="advancedsearch">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <label class="sr-only" for="property-status">Tỉnh/Thành phố</label>
                            <select id="property-status" name="property-status" data-placeholder="Property Status" class="chosen-select">
                                <option selected="selected" value="Property Status">Tỉnh/Thành phố</option>
                                <option value="sale">For Sale</option>
                                <option value="rent">For Rent</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
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
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <label class="sr-only" for="property-types">Phường/Xã</label>
                            <select id="property-types" name="property-types" data-placeholder="Property Types" class="chosen-select">
                                <option selected="selected" value="Property Types">Phường/Xã</option>
                                <option value="residential">Residential</option>
                                <option value="commercial">Commercial</option>
                                <option value="land">Land</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <label class="sr-only" for="area-from">Đường/Phố</label>
                            <select id="area-from" name="area-from" data-placeholder="Area From" class="chosen-select">
                                <option selected="selected" value="Area From">Đường/Phố</option>
                                <option value="450">450</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-3">
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
                    </div>
                    <div class="col-xs-6 col-sm-3">
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
                    </div>
                    <div class="col-xs-6 col-sm-3">
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
