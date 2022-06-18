<header>
    <div id="top">
        <div class="container">
            <p class="pull-left text-note hidden-xs"><i class="fa fa-phone"></i> Hotline: 0378 642 530</p>
            <ul class="nav nav-pills nav-top navbar-right">
                <li><a href="{{ route('list-news') }}">Tin tức</a></li>
                <li><a href="{{ route('login') }}">Đăng Bài</a></li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-default pgl-navbar-main" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="logo" href="index-2.html"><img src="{{ asset('images/header-logo.7a6f7de8.svg') }}" alt="Flatize"></a> </div>

            <div class="navbar-collapse collapse width">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                        <ul class="dropdown-menu">
                            @foreach ($category as $item)
                            <li><a href="{{ route('show-property', ['id_category'=> $item->id]) }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                            @foreach ($property_type as $item)
                            <li><a href="{{ route('show-auction', ['id_property_type'=>$item->id]) }}">{{ $item->name }}</a></li>
                            @endforeach
                    {{-- @foreach ($property_type as $pt)
                    <li><a href="{{ route('show-auction', ['id_property_type'=>$item->id]) }}">{{ $pt->name }}</a></li>
                    @endforeach --}}
                    <li><a href="{{ route('show-about') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('show-contact') }}">Liên hệ</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
</header>
