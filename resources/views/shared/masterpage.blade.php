<!doctype html>
<html lang="{{ App::getLocale() }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('metatags')
        <!-- Bootstrap CSS -->
        @include('shared.head')
        <title>@yield('title')</title>
        @yield('custom_head')
    </head>
    <body>
        @yield('maincontainer')
        @include('shared.footer')
        @yield('footerjs')
        @include('shared.loading')
    </body>
</html>