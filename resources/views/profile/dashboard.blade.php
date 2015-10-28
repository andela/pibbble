@extends('master')
@section('title', 'Dashboard')

@endsection

@section('custom-css')
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-social.css') }}"> <!-- Resource style -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- CSS reset -->
@endsection

@section('content')
<div class="container-fluid ball">
        <div class="container">
            <div class="fb-profile">
                <img align="left" class="fb-image-lg" src="http://i58.tinypic.com/2464bc2.jpg" alt="Profile image example" / height="351px" width="815px">
                <img align="left" class="fb-image-profile thumbnail" src="{{ Auth::user()->getAvatar() }}" alt="Profile image example" border-radius="100%">
                <div class="fb-profile-text red col-md-8 col-xs-3">
                    <h1> {{ Auth::user()->username }}</h1>
                    <p>Unicodeveloper</p>
                    <p>Lagos, Nigeria</p>
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
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</button>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Bio</button>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open"></span> Skills</button>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Follow</button>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Hire Me</button>
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
                            <p>Projects <span class="badge pull-right">2</span></p>
                            <hr>
                            <p>Posts <span class="badge pull-right">2</span></p>
                            <hr>
                            <p>Shares <span class="badge pull-right">2</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>My Projects</h4></div>
                        <div class="panel-body">
                            <h2>You are yet to upload a project!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

