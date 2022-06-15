<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from pixelgeeklab.com/html/realestast/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2015 08:53:00 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Flatize - Shop HTML5 Responsive Template">
	<meta name="author" content="pixelgeeklab.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RealEstast</title>

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

	<!-- Bootstrap -->
	<link href="{{ asset('frontend/users/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Libs CSS -->
	<link href="{{ asset('frontend/users/css/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('frontend/users/vendor/owl-carousel/owl.carousel.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('frontend/users/vendor/owl-carousel/owl.theme.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('frontend/users/vendor/flexslider/flexslider.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('frontend/users/vendor/chosen/chosen.css') }}" media="screen">

	<!-- Theme -->
	<link href="{{ asset('frontend/users/css/theme-animate.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/users/css/theme-elements.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/users/css/theme-blog.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/users/css/theme-map.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/users/css/theme.css') }}" rel="stylesheet">

	<!-- Style Switcher-->
	<link rel="stylesheet" href="{{ asset('frontend/users/style-switcher/css/style-switcher.css') }}">
	<link href="{{ asset('frontend/users/css/colors/red/style.html') }}" rel="stylesheet" id="layoutstyle">

	<!-- Theme Responsive-->
	<link href="{{ asset('frontend/users/css/theme-responsive.css') }}" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="page">
		@include('user.layouts.header')

		<!-- Begin Main -->
        @yield('content')
		<!-- End Main -->
        @include('user.layouts.footer')
        @include('user.modal-contact')

	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{ asset('frontend/users/vendor/jquery.min.js') }}"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{ asset('frontend/users/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/users/vendor/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('frontend/users/vendor/flexslider/jquery.flexslider-min.js') }}"></script>
	<script src="{{ asset('frontend/users/vendor/chosen/chosen.jquery.min.js') }}"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
	<script src="{{ asset('frontend/users/vendor/gmap/gmap3.infobox.min.js') }}"></script>
	<script src="{{ asset('frontend/users/vendor/masonry/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('frontend/users/vendor/masonry/masonry.pkgd.min.js') }}"></script>

	<!-- Theme Initializer -->
	<script src="{{ asset('frontend/users/js/theme.plugins.js') }}"></script>
	<script src="{{ asset('frontend/users/js/theme.js') }}"></script>

	<!-- Style Switcher -->
	<script type="text/javascript" src="{{ asset('frontend/users/style-switcher/js/switcher.js') }}"></script>
    @yield('script')
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

<script>
    $('.btn-contact').click(function(e) {
        var url = $(this).attr('data-url');

        $('#modal-contact').modal('show');
        e.preventDefault();
        $.ajax({
            url: url,
            type: 'get',

            success: function(response) {
                $('#form-contact').attr('action', '{{ asset('home/customer-contact/') }}/' + response.data.id)
            },
            error: function(error) {

            }
        })
    })
</script>
</body>

<!-- Mirrored from pixelgeeklab.com/html/realestast/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2015 08:54:11 GMT -->
</html>
