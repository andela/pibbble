@extends('master')
@section('title', 'Pibbble')

@section('content')
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
    @include('others.projects_grid')
  </div>
@endsection