<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('imgs/favicon.png') }}" type="image/x-icon">
    @yield('ckeditor-top-js')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
    <title>{{ config('app.name') }}</title>
</head>

<body class="bg-gray-100 h-screen antialiased font-sans">
    <div id="app">
        {{ $slot }}
    </div>
    @if (request()->is('dashboard/product/*'))
    <script>
        setTimeout(function(){
        CKEDITOR.replace( 'short_details' ); //Your selector must match the textarea ID
        },50);
        setTimeout(function(){
        CKEDITOR.replace( 'long_details' ); //Your selector must match the textarea ID
        },100);
    </script>
    @endif
</body>

</html>