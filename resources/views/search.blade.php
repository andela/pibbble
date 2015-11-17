@extends('layouts.master')
@section('title', 'Search Result')

@section('content')
<div class="search" style="min-height: 426px">
    <div class="nav navbar-center" style="background-color: #FFCCCC; margin-top: -28px">
        <h3 style="color: #F05A5A">SEARCH RESULTS</h3>
    </div>
    <div class="container">

      @if(!$projects)
      <div>
          <h4 style="text-align: center; margin-top: 20px">No results found for your query.</h4>
      </div>
      @endif

      @foreach ($projects as $project)
          <div class='projects-container'>
              <div class='projects-container'>
                  <div class='projects'>
                      <a href='/'><img src='{{ $project->url }}' width='200' height='150' style='border:0px solid #ccc;' /></a>
                      <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
                      <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
                  </div>
                  <span class='projects-name'><a href="">{{ $project->projectname }}</a></span>
              </div>
          </div>
      @endforeach

    </div>
</div>
@endsection
