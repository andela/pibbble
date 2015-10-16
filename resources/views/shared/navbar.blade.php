<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid topmost-nav">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Pibbble</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Developers <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">All</a></li>
            <li><a href="#">For Hire</a></li>
            <li class="divider"></li>
            <li><a href="#">Skills</a></li>
            <li><a href="#">Countries</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teams<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">All</a></li>
            <li><a href="#">Now Hiring</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Meet Ups<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">All</a></li>
            <li><a href="#">Host a Meetup</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <button type="button" class="btn auth-btn" onclick="sign_up_user()">Sign up</button>
        <button type="button" class="btn auth-btn" style="margin-right:50px;" onclick="sign_in_user()">Sign in</button>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-info">Go</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<script>
  function sign_up_user() {
    window.location.href = "/register";
  }
  function sign_in_user() {
    window.location.href = "/login";
  }
</script>
