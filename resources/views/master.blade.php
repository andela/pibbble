<!DOCTYPE html>
<html lang="en">
  <head>
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.muicss.com/mui-0.1.21/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/ripples.min.js"></script>
    <script src="/js/material.min.js"></script>
    <script src="//cdn.muicss.com/mui-0.1.21/js/mui.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/display.js') !!}"></script>
    <script>
      $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
      });
    </script>
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->

    <link href="/css/roboto.min.css" rel="stylesheet">
    <!--<link href="/css/material.min.css" rel="stylesheet">-->
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
