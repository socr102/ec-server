<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta content="this is eatchef project" name="descriptison">
    <meta content="" name="keywords">

    {{-- Favicons --}}
    <link rel="apple-touch-icon" href="{{asset('images/favicon/favicon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('images/favicon/favicon.png')}}">

    {{-- CameraTag --}}
    <link href="{{ asset('css/cameratag.css') }}" rel="stylesheet">

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    {{-- Animate CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @yield('style')

    <!-- CKEDITOR -->
    <script src="{{asset('ckeditor-basic/ckeditor.js')}}"></script>

    {{-- Share button --}}
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6050b13a39329f00123ae979&product=inline-share-buttons" async="async"></script>

    {{-- Styling --}}
    <link href="{{ asset('css/app.css?v1.0.14') }}" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    {{-- ChartJS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>
    @yield('content')

    <div id="preloader"></div>

    {{-- CKEDITOR --}}
    <script src="{{ asset('ckeditor-basic/ckeditor.js') }}"></script>

    {{-- Typed JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.5/typed.min.js" integrity="sha512-1KbKusm/hAtkX5FScVR5G36wodIMnVd/aP04af06iyQTkD17szAMGNmxfNH+tEuFp3Og/P5G32L1qEC47CZbUQ==" crossorigin="anonymous"></script>

    {{-- Ionicons --}}
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    {{-- My JS --}}
    <script src="{{ asset('js/main.js?v1.0.14') }}"></script>

    {{-- google --}}
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    {{-- CaneraTag --}}
    <script src='//cameratag.com/api/v14/js/cameratag.min.js' type='text/javascript'></script>

    @yield('script')
</body>

</html>
