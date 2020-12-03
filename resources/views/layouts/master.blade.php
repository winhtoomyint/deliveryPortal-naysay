<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('/images/bg_images/titelicon.png')}}" type="image/x-icon">
    <!-- FAVICON -->
    <link href="{{asset('/img/favicon.png')}}" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap/css/bootstrap-slider.css')}}">
    <!-- Font Awesome -->
    <link href="{{asset('/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{asset('/plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('/plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="{{asset('/plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
    <link href="{{asset('/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        body {
            margin: 0px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
            width: 100%;
            margin-left: 0px;

        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
    @yield('css')
</head>

<body class="body-wrapper">
    <div class="main-home">
        <section class="category_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @include('partial.header')
                    </div>
                </div>
            </div>
        </section>

        @yield('content')
        <!-- JAVASCRIPTS -->
        <script src="{{asset('/plugins/jQuery/jquery.min.js')}}"></script>
        <script src="{{asset('/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
        <!-- tether js -->
        <script src="{{asset('/plugins/tether/js/tether.min.js')}}"></script>
        <script src="{{asset('/plugins/raty/jquery.raty-fa.js')}}"></script>
        <script src="{{asset('/plugins/slick-carousel/slick/slick.min.js')}}"></script>
        <script src="{{asset('/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
        <script src="{{asset('/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
        <!-- google map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
        <script src="{{asset('/plugins/google-map/gmap.js')}}"></script>
        <script src="{{asset('/js/script.js')}}"></script>
        @yield('javascript')
</body>
@include('partial.footer')

</html>