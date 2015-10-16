<!DOCTYPE html>
<html lang="en">
  <head>
    <title> @yield('title') </title>
    <link href="/components/mui-0.1.22-rc1/css/mui.min.css" rel="stylesheet" />
    <link href="/components/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/components/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href="/css/bootstrap-social.css" rel="stylesheet">
    <link href="/css/display.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <!-- mobile first; proper rendering on several devices and touch zooming  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    @include('shared.navbar')
    @yield('content')
    @include('shared.footer')
    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/components/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="/components/mui-0.1.22-rc1/js/mui.min.js"></script>
  </body>
</html>