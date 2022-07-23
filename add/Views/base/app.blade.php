<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="When active, the navigation will slide over the top of the content.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Larabon</title>

    {{-- CSS --}}

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;family=Ubuntu:wght@400;500;700&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/libraries/themify-icon/t-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/nifty/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/nifty/nifty.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/animate-css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/spinkit/css/spinkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/toast/toast.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/swal2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/bootstrap-datepicker/dp.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/custom/css/custom.css') }}">

</head>

<body class="out-quart">

    <div class="loader">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>

    <div id="root" class="root mn--slide hd--sticky mn--sticky hd--fair hd--expanded">
        <section id="content" class="content">
            @include('base.head')
            <div class="content__boxed">
                <div class="content__wrap">
                    <div class="row">
                        <div class="col-xl-12 mb-3">
                            @yield('main')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('base.header')
        @include('base.sidebar')
    </div>

    <div class="scroll-container">
        <a href="#root" class="scroll-page rounded-circle ratio ratio-1x1" aria-label="Scroll button"></a>
    </div>

    <script src="{{ asset('libraries/jquery.min.js') }}"></script>
    <script src="{{ asset('libraries/popper.js') }}"></script>
    <script src="{{ asset('libraries/moment.js') }}"></script>
    <script src="{{ asset('libraries/AutoNumeric.js') }}"></script>
    <script src="{{ asset('libraries/nifty/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('libraries/nifty/nifty.min.js') }}" defer></script>
    <script src="{{ asset('libraries/toast/toast.min.js') }}" defer></script>
    <script src="{{ asset('libraries/swal2/sweetalert2.all.min.js') }}" defer></script>
    <script src="{{ asset('libraries/select2/select2.min.js') }}" defer></script>
    <script src="{{ asset('libraries/bootstrap-datepicker/dp.min.js') }}" defer></script>
    <script src="{{ asset('custom/js/customnotif.js') }}" defer></script>

  
    @include('js.global')
    @yield('js')

</body>

</html>
