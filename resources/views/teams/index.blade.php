@extends('layouts.master')
@section('title', 'All Teams')
@section('custom-css')
<link rel="stylesheet" href="{{ load_asset('css/teams.css') }}">
@endsection
@section('content')
<div class="container" style="min-height: 390px">
<div class="content">
    <div class="text-center">
        <h3 class="header-grey"><b class="dudu">Teams</b> are organizations who share their designs, products, and jobs</h3>
    </div>
    <hr class="ash">
    <div class="row">
        <div class="col-sm-9">
        @foreach($teams as $team)
        <div class="row under">
            <div class="col-sm-5">
                <span class="pull-left"><img src="http://placehold.it/90x90" class="team-pix"></span>
                <span class="meta-body">
                    <b><a href="{{ url('/teams/'.$team->name.'/dashboard')}}">{{ $team->name }} </a></b> <span class="hire-icon"><i class="fa fa-envelope hire"></i></span><br>
                    <span class="meta-body loc">Lagos, Nigeria</span>
                    <span class="meta-body">
                        <br><small>ui, ux, android, games </small>
                    </span>
                    <ul>
                        <li class="stat-shots" style="padding-left:10px;">
                            <a href="#">464<span class="meta">shots</span></a>
                        </li>
                        <li class="stat-shots">
                            <a href="#">54,201<span class="meta">followers</span></a>
                        </li>
                        <li>
                            <i class="fa fa-plus-square fa-2x"></i>
                        </li>
                    </ul>
                </span>
            </div>
            <div class="col-sm-7 hidden-xs">
                <div class="row">
                    <div class="col-sm-4"><a href=""><img src="http://placehold.it/120x90"></a></div>
                    <div class="col-sm-4"><a href=""><img src="http://placehold.it/120x90"></a></div>
                    <div class="col-sm-4"><a href=""><img src="http://placehold.it/120x90"></a></div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        <div class="col-sm-3">
            <a href="/teams/new" class="full">
            <div class="well show">
                <h5>Create a <span class="badge">TEAM</span></h5>
                <small>Get your organization on Pibbble</small>
            </div>
            </a>
        </div>
    </div>
    {!! $teams->render() !!}
</div>
</div>
@endsection