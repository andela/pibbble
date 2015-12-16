<nav class="navbar navbar-default" style="background-color: #fff; margin-top:-20px;">
    <div id="lower-navbar">
        <ul class="nav navbar-nav navbar-left" style="padding-left:505px; color: #777;">
            <li><a href="/" class="proj-links">Featured</a></li>
            <li><a href="/" class="proj-links">Latest</a></li>
            <li><a href="#" class="proj-links dropdown-toggle" data-toggle="dropdown">Popular <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/sort/likes">Most Liked</a></li>
                <li><a href="/sort/views">Most Viewed</a></li>
                <li><a href="/sort/comments">Most Commented</a></li>
              </ul>
            </li>
        </ul>
    </div>
  </nav>

  <div class="container min_height_400">
    @include('others.projects_grid')
  </div>