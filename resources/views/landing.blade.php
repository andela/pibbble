@extends('master')
@section('title', 'Pibbble')

@section('content')
</nav>
  <nav class="navbar navbar-default" style="background-color: #fff; margin-top:-20px;">
    <div id="lower-navbar">
        <ul class="nav navbar-nav navbar-left" style="padding-left:15px; color: #777;">
            <li><a href="/" class="proj-links">Featured</a></li>
            <li><a href="/" class="proj-links">Latest</a></li>
            <li><a href="/" class="proj-links">Popular</a></li>
        </ul>
    </div>
  </nav>

  <div class="container">
    <?php
    for ($i = 0; $i < 12; $i++) {
      echo("<div class='projects-container'>");
      echo("<div class='projects'>");
      echo("<a href=''>");
      echo("<img src='/img/shot.png' width='200' height='150' style='border:0px solid #ccc;' />");
      echo("</a>");
      echo("<span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;0</span>");
      echo("<span class='project-stats'><i class='fa fa-eye'></i>&nbsp;0</span>");
      echo("</div>");
      echo("<span class='projects-name'>Project title</span>");
      echo("</div>");
    }
    ?>
    <br clear="left" />
    <center>
    <ul class="pagination">
      <li>
        <a href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
    </center>
  </div>
@endsection