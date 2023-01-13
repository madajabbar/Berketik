<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Pintu Cerdas</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Frontend/img/favicon.svg') }}" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap-5.0.0-alpha-2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Frontend/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('Frontend/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('Frontend/css/main.css') }}" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->
    @include('frontend.layouts.partial.navbar')


    @yield('content')


    @include('frontend.layouts.partial.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>
    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('Frontend/js/bootstrap.5.0.0.alpha-2-min.js') }}"></script>
    <script src="{{ asset('Frontend/js/count-up.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/main.js') }}"></script>
</body>

</html>
