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
              <a href="/teams" class="dropdown-toggle" data-toggle="dropdown">Teams<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/teams') }}">All</a></li>
                <li><a href="#">Now Hiring</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/teams/new') }}">Add your Team</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Meet Ups<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">All</a></li>
                <li><a href="{{ url('/meetup') }}">Host a Meetup</a></li>
              </ul>
            </li>
        </ul>
        <form method="POST" action="/search" class="form-inline navbar-form navbar-right" role="search">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" name="searchinput" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-info">Go</button>
            @if (Auth::check())
                <div class="form-group dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">{{ Auth::user()->username }}  <img class="avatar" src="{{ Auth::user()->getAvatar() }}" /></button>
                  <ul class="ddColor dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation" class="dashboard-item"><a role="menuitem" tabindex="-1" href="/dashboard">Dashboard </a></li>
                    <li role="presentation" class="profile-item"><a role="menuitem" tabindex="-1" href="/settings/profile">Profile settings</a></li>
                    <li role="presentation" class="logout-item"><a role="menuitem" tabindex="-1" href="/auth/logout">Log out</a></li>
                  </ul>
                </div>
            @else
                <button type="button" id="sign-up-button" class="btn auth-btn">Register</button>
                <button type="button" id="sign-in-button" class="btn auth-btn" style="margin-right:50px;">Log in</button>
            @endif
        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<script src="{{ load_asset('/js/auth.js') }}"></script>
<script type="text/javascript" src="{{ load_asset('/js/app.js') }}"></script>
