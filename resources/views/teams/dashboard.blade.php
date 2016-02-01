@extends('layouts.master')

@section('title', 'Team Dashboard')

@section('custom-css')
<link rel="stylesheet" href="{{ load_asset('css/teams.css') }}">
@endsection

@section('content')
    <nav class="navbar navbar-default" style="background-color: #fff; margin-top:-20px;">
    <div class="navbar-content">
    <div class="pull-left">
        <ul class="navbar-links">
            <li><a href="" class="all-teams badge"><span class="name">TEAM</span></a></li>
            <li><a href=""><span class="count">467  </span><span class="criteria"> Shots</span></a></li>
            <li><a href=""><span class="count">54,697  </span><span class="criteria"> Followers</span></a></li>
            <li><a href=""><span class="count">7  </span><span class="criteria"> Members</span></a></li>
            <li><a href=""  class="dropdown dropdown-toggle" data-toggle="dropdown"><span class="criteria">More </span><span class="caret caret_color"></span></a></li>
            <ul class="dropdown-menu">
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
              <li><a href="#">JavaScript</a></li>
            </ul>
        </ul>
    </div>
    <div class="pull-right">
        abn
    </div>

    </div>
    </nav>
@endsection