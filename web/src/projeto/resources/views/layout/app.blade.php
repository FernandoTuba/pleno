<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#FFFFFF"/>

        <title>@yield('title')Banco IST</title>

        {{-- <link rel="icon" href="{{ asset('imgs/favicon.ico') }}" sizes="any">
        <link rel="icon" href="{{ asset('imgs/favicon.ico') }}" type="image/svg+xml">
        <link rel="apple-touch-icon" href="{{ asset('imgs/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
        <link href="{{ asset('css/splide.min.css') }}" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('css/app.css?v='.@filemtime(public_path('css/app.css'))) }}" rel="stylesheet"> --}}
        <link href="{{ asset('projeto/public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('projeto/public/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('projeto/public/css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('projeto/public/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('projeto/public/css/remixicon.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">--}}

        {{-- <script data-cfasync="false" src="{{ asset('projeto/public/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
        <script data-cfasync="false" src="{{ asset('projeto/public/js/bootstrap.min.js') }}" type="text/javascript"></script> --}}

        {{-- <link rel="stylesheet" href="@sweetalert2/theme-bootstrap-4/bootstrap-4.css"> --}}

        @livewireStyles
        {{-- ------------------------------ --}}
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        {{-- <title>OnePage Bootstrap Template - Index</title>
        <meta content="" name="description">
        <meta content="" name="keywords"> --}}

        <!-- Favicons -->
        {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
        <link href="{{ asset('projeto/public/img/fav.png') }}" rel="icon">
        {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        {{-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('projeto/public/vendor/aos/aos.css') }}" rel="stylesheet"> --}}

        {{-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
        {{-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> --}}
        {{-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> --}}
        {{-- <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> --}}
        {{-- ------------------------------ --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    </head>
    <body>

        <main>
            @yield('content')
        </main>

        <script src="{{ asset('projeto/public/js/app.js') }}"></script>
        <script src="{{ asset('projeto/public/js/functions.js') }}"></script>
        <script src="{{ asset('projeto/public/js/vanilla-masker.min.js') }}"></script>
        @livewireScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />

        {{-- <script src="sweetalert2/dist/sweetalert2.min.js"></script> --}}

        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        {{--

        <script src="{{ asset('js/croppie.js') }}" referrerpolicy="origin"></script>
        <script src="{{ asset('js/splide.min.js') }}" referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script> --}}


    </body>
</html>
