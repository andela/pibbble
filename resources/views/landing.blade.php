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

    <!-- Modal -->
    <!--
    <div class="modal fade" id="project" role="dialog">
      <div class="modal-dialog" style="width:70%; height:500px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    -->
  </div>
@endsection