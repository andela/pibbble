@extends('layouts.master')
@section('title')
Dashboard
@endsection

@section('custom-css')
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-social.css') }}"> <!-- Resource style -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- CSS reset -->
@endsection

@section('content')
<div class="container-fluid ball">
        <div class="container">
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-12">
          @include('layouts.partials.alerts')
            <div class="fb-profile">
            <div class="cover-container">
                <img align="left" class="fb-image-lg img-responsive" src="http://goo.gl/b6Sxx3" alt="Cover image" / width="100%" >
                </div>
                <img align="left" class="fb-image-profile thumbnail img-responsive" src="{{ Auth::user()->getAvatar() }}" alt="Profile image example" border-radius="100%">
                <div class="fb-profile-text red col-md-8 col-xs-3">
                    <h1> {{ Auth::user()->username }}</h1>
                    <p>{{ Auth::user()->job }}</p>
                    <p>{{ Auth::user()->location }}</p>
                </div>
            </div>
            <div class="well well-sm makeup">
                <div class="span12">
                    <a class="btn btn-social-icon btn-twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-social-icon btn-google">
                        <i class="fa fa-google"></i>
                    </a>
                    <a class="btn btn-social-icon btn-facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-social-icon btn-linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <div class="btn-group pull-right">
                    @if($user->username == Auth::user()->username)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myUpload"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</button>
                        <button type="button" class="btn btn-primary" id="menu1" data-toggle="dropdown" data-target="#myModal"><span class="glyphicon glyphicon-folder-open"></span> Skills<span class="caret"></span></button>
                        <ul class="ddColor dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1">HTML</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">CSS</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">JavaScript</a></li>
                        </ul>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myBio"><span class="glyphicon glyphicon-eye-open"></span> Bio</button>
                    </div>
                    @else
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myBio"><span class="glyphicon glyphicon-eye-open"></span> Bio</button>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-log-in" onclick="change()" type="button" value="Follow" id="myButton1"></span> Follow</button>
                        <button type="button" class="btn btn-primary" id="menu1" data-toggle="dropdown" data-target="#myModal"><span class="glyphicon glyphicon-folder-open"></span> Skills<span class="caret"></span></button>
                        <ul class="ddColor dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1">HTML</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">CSS</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">JavaScript</a></li>
                        </ul>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myHire"><span class="glyphicon glyphicon-user"></span> Hire Me</button>
                    @endif
                    </div>
                </div>
            </div>
        </div>


            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Activity Feed</h4></div>
                        <div class="panel-body">
                            <p>Following <span class="badge pull-right">5</span></p>
                            <hr>
                            <p>Followers <span class="badge pull-right">10</span></p>
                            <hr>
                            <p>Projects <span class="badge pull-right">{{ $projects->count() }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>My Projects</h4></div>
                        <div class="panel-body">
                            @if( $projects )
                            <div class="row">
                                @foreach ($projects as $project)
                                <div class="col-md-4">
                                    @include('others.project_modal')
                                </div>

                                @endforeach
                            </div>
                        @endif
                        @if( $projects->isEmpty() )
                           <h3>There are currently no Projects</h3>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('others.dashboard_modal')

</div>
@endsection

