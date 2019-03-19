<!DOCTYPE html>
<head>
    <title>Online Book Download</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ URL::asset('css/app.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/zoomslider.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/style6.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/extended_style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>

<body>
    <!--pre-loader-->
    <div class="preloader"><span class="beacon"></span></div>
    @include('./layouts.header')
    @yield('content')
    @include('./layouts.footer')
    
    <!-- js -->
    <!--/slider-->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.zoomslider.min.js') }}"></script>
    <!--//slider-->
    <!--search jQuery-->
    <script src="{{ URL::asset('js/classie-search.js') }}"></script>
    <script src="{{ URL::asset('js/demo1-search.js') }}"></script>
    <!--//search jQuery-->
    
    <!-- stats -->
    <script src="{{ URL::asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.countup.js') }}"></script>
    <!-- //stats -->

    <!-- //js -->
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <!--/ start-smoth-scrolling -->
    <script src="{{ URL::asset('js/move-top.js') }}"></script>
    <script src="{{ URL::asset('js/easing.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
</body>

</html>