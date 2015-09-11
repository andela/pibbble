<!-- HTML 5 doctype-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> @yield('title') </title>

    <link href="/components/mui/dist/css/mui.min.css" rel="stylesheet" type="text/css" />

    <!-- Include bootstrap.css -->
    <link href="/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="/components/bootstrap-material-design/dist/css/roboto.min.css" rel="stylesheet">
    <link href="/components/bootstrap-material-design/dist/css/material.min.css" rel="stylesheet">
    <link href="/components/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <!-- mobile first; proper rendering on several devices and touch zooming  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    @include('shared.navbar')
    @yield('content')
    <!-- Include jquery -->
    <script src="/components/jquery/dist/jquery.min.js"></script>
    <!-- Include bootstrap.js-->
    <script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Include ripples.js and material.js -->
    <script src="/components/bootstrap-material-design/dist/js/ripples.min.js"></script>
    <script src="/components/bootstrap-material-design/dist/js/material.min.js"></script>

    <script src="/components/mui/dist/js/mui.min.js"></script>

    <script type="text/javascript" src="js/app.js"></script>
    <script>
      $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
      });
    </script>
  </body>
</html>