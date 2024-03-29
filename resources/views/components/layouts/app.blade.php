<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('imgs/favicon.png') }}" type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <!-- Styles -->
    @yield('bootstrap')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/style.css') }}" rel="stylesheet">
    <title>Ecommerce-Shop | @yield('title')</title>
</head>

<body class="bg-white antialiased">
    <div id="app">
        <App></App>
        <Toastr text_msg="" text_classes=""></Toastr>
        @include('inc.home.header')
        {{ $slot }}
        @include('inc.footer-section.footer-nav')
        @include('inc.footer-section.footer')
    </div>

    <script>
        // nothing
    </script>
</body>

</html>