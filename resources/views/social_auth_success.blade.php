<html>
<head>
<title></title>
</head>
 <body>
    <div class="container">
        <div class="content">
            <div class="title">Laravel 5</div>
            Authentication successful

            <div>
              <h4>Name: {{ Auth::user()->name }}</h4>
              <h4>Email: {{ Auth::user()->email }}</h4>
              <img src="{{ Auth::user()->avatar }}" height="200" width="200" />
            </div>

        </div>
    </div>
</body>
</html>