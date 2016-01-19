<!DOCTYPE html>
<html lang="en">
  <head>
    <title> @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ load_asset('/components/mui-0.1.22-rc1/css/mui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/components/font-awesome-4.4.0/css/font-awesome.min.css') }}" rel="stylesheet" >
    <link href="{{ load_asset('/components/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ load_asset('/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ load_asset('/components/bootstrap-3.3.5-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ load_asset('/components/mui-0.1.22-rc1/js/mui.min.js') }}"></script>
    <link href="{{ load_asset('/css/roboto.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ load_asset('/css/ripples.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ load_asset('/css/display.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ load_asset('/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ load_asset('/css/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ load_asset('/css/meetups.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ load_asset('/css/profile-style.css') }}" rel="stylesheet" type="text/css">
    @yield('custom-css')
  </head>
  <body>
    @include('shared.navbar')
    @yield('content')
    @include('shared.footer')
  </body>
</html>
