@extends('layouts.master')
@section('title', 'Projects')
Dashboard
@endsection

@section('custom-css')
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ load_asset('css/bootstrap-social.css') }}">
<!-- Resource style -->
<link rel="stylesheet" href="{{ load_asset('css/dashboard.css') }}">
<!-- CSS reset -->
@endsection @section('content')

<div class="container-fluid ball">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              @include('layouts.partials.alerts')
            </div>
                <div class="col-md-12">
                    <div class="fb-profile">
                        <img align="left" class="fb-image-lg img-responsive" src="http://goo.gl/b6Sxx3" alt="Cover image"  width="100%">
                        <img align="left" class="fb-image-profile thumbnail img-responsive" src="{{ $user->getAvatar() }}" alt="Profile image example" border-radius="100%">
                        <div class="fb-profile-text red col-md-8">
                            <h1>{{ $user->username }}</h1>
                            <p>{{ $user->job }}</p>
                            <p>{{ $user->location }}</p>
                        </div>
                    </div>
                    <div class="well well-sm makeup">
                        <div class="row">
                            <div class="pull-left">
                                @if (! empty($user->github) && ! ctype_space($user->github))
                                <a href="http://github.com/{{ $user->github }}" class="btn btn-social-icon btn-github">
                                    <i class="fa fa-github"></i>
                                </a>
                                @endif
                                @if (! empty($user->twitter) && ! ctype_space($user->twitter))
                                <a href="http://twitter.com/{{ $user->twitter }}" class="btn btn-social-icon btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                @endif
                                @if (! empty($user->facebook) && ! ctype_space($user->facebook))
                                <a href="{{ $user->facebook }}" class="btn btn-social-icon btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                @endif
                                @if (! empty($user->linkedin) && ! ctype_space($user->linkedin)))
                                <a href="{{ $user->linkedin }}" class="btn btn-social-icon btn-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                @endif
                            </div>
                            @can('owner-can-see', $user->id)
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myUpload"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mySkills"><span class="glyphicon glyphicon-folder-open"></span> Skills</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myBio"><span class="glyphicon glyphicon-eye-open"></span> Bio</button>
                                </div>
                            @endcan
                            @can('users-can-see', $user->id)
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myBio"><span class="glyphicon glyphicon-eye-open"></span> Bio</button>
                                    <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-log-in" onclick="change()" type="button" value="Follow" id="myButton1"></span> Follow</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mySkills"><span class="glyphicon glyphicon-folder-open"></span> Skills</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myHire"><span class="glyphicon glyphicon-user"></span> Hire Me</button>
                                </div>
                            @endcan
                            @if(! Auth::check())
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myBio"><span class="glyphicon glyphicon-eye-open"></span> Bio</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mySkills"><span class="glyphicon glyphicon-folder-open"></span> Skills</button>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Activity Feed</h4>
                        </div>
                        <div class="panel-body">
                            <p>Following <span class="badge pull-right">5</span></p>
                            <hr>
                            <p>Followers <span class="badge pull-right">10</span></p>
                            <hr>
                            <p>Projects <span class="badge pull-right">{{ $user->projects->count() }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>My Projects</h4></div>
                        <div class="panel-body">
                            @if( $user->projects )
                                <div class="row">
                                    @foreach ($user->projects as $project)
                                    <div class="col-md-4">
                                        @include('others.project_modal')
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                            @if( $user->projects->isEmpty() )
                                <h3>There are currently no projects.</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('others.dashboard_modal')
</div>

@endsection
