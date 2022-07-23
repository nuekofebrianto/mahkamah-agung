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
    <link rel="stylesheet" href="{{ asset('/custom/css/custom.css') }}">


</head>

<body>
    <div id="root" class="root mn--slide hd--sticky mn--sticky hd--fair hd--expanded">
        <section id="content" class="content">
            <div class="content__header content__boxed overlapping">
                <div class="content__wrap">
            
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                       <br>
                    </nav>
                    <!-- END : Breadcrumb -->
            
                    {{-- <h1 class="page-title mb-0 mt-2 text-center">Login</h1> --}}
                    
                    <p class="lead">
                        {{-- List Data --}}
                    </p>
                    
            
                </div>
            
            </div>
            <div class="content__boxed">
                <div class="content__wrap">
                    <div class="row">
                        <div class="col-xl-4 offset-4 mb-3">
                            @yield('main')
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
    </div>

    <script src="{{ asset('nifty/js/jquery.min.js') }}"></script>
    <script src="{{ asset('nifty/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('nifty/js/nifty.min.js') }}"></script>
    <script src="{{ asset('nifty/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('libraries/toast/toast.min.js') }}" defer></script>
    <script src="{{ asset('custom/js/customnotif.js') }}" defer></script>

    @yield('js')

</body>

</html>
