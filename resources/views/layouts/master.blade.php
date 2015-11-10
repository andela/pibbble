<!DOCTYPE html>
<html lang="en">
  <head>
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/components/mui-0.1.22-rc1/css/mui.min.css" rel="stylesheet" />
    <link href="/components/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href="/components/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/components/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="/js/ripples.min.js"></script>
    <script src="/js/material.min.js"></script>
    <script src="/components/mui-0.1.22-rc1/js/mui.min.js"></script>
    <script>
      $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
      });
    </script>
    <link href="/css/roboto.min.css" rel="stylesheet">
    <link href="/css/ripples.min.css" rel="stylesheet">
    <link href="/css/display.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/profile-style.css" rel="stylesheet">
    @yield('custom-css')
  </head>
  <body>
    @include('shared.navbar')
    @yield('content')
    @include('shared.footer')
  </body>
</html>
