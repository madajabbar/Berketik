<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('Backend/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('Backend/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('Backend/assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('Backend/assets/css/shared/iconly.css') }}">

    <link rel="stylesheet" href="{{asset('Backend/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <!-- Scripts -->
    @yield('css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('backend.layouts.components.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('header')
            @yield('content')

            @include('backend.layouts.components.footer')
        </div>
    </div>
    <script src="{{ asset('Backend/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/app.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('Backend/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/pages/dashboard.js') }}"></script>

    @yield('js')

</body>

</html>
