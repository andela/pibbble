@extends('layouts.master')
@section('title', 'Projects')


@section('custom-css')
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ load_asset('css/bootstrap-social.css') }}">
<!-- Resource style -->
<link rel="stylesheet" href="{{ load_asset('css/dashboard.css') }}">
<!-- CSS reset -->
@endsection

@section('content')

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
                                @if (sanitize($user->github))
                                <a href="http://github.com/{{ $user->github }}" class="btn btn-social-icon btn-github" target="_blank">
                                    <i class="fa fa-github"></i>
                                </a>
                                @endif
                                @if (sanitize($user->twitter))
                                <a href="http://twitter.com/{{ $user->twitter }}" class="btn btn-social-icon btn-twitter" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                @endif
                                @if (sanitize($user->facebook))
                                <a href="http://facebook.com/{{ $user->facebook }}" class="btn btn-social-icon btn-facebook" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                @endif
                                @if (sanitize($user->linkedin))
                                <a href="http://linkedin.com/in/{{ $user->linkedin }}" class="btn btn-social-icon btn-linkedin" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                @endif
                            </div>
                            @can('owner-can-see', $user->id)
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myUpload"><i class="fa fa-cloud-upload fa-lg"></i> Upload</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mySkills"><i class="fa fa-archive fa-lg"></i> Skills</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myBio"><span class="glyphicon glyphicon-eye-open"></span> Bio</button>
                                </div>
                            @endcan

                            @can('users-can-see', $user->id)
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myBio"><i class="fa fa-user fa-lg"></i> Bio</button>
                                    <button type="button" id="followButton" data-id="{{ $user->id }}" class="btn btn-primary btn-sm">{{ $user->checkFollow() ? 'Following' : 'Follow' }}</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mySkills"><i class="fa fa-archive fa-lg"></i> Skills</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myHire"><i class="fa fa-phone fa-lg"></i> Hire Me</button>
                                </div>
                            @endcan
                            @if(! Auth::check())
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myBio"><i class="fa fa-user fa-lg"></i> Bio</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mySkills"><i class="fa fa-archive fa-lg"></i> Skills</button>
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
                            <span id="me" data-me="{{ $user->me }}"></span>
                            <a href="#" id="followsLink" data-url="/follows/{{ $user->id }}">Following <span class="badge pull-right" id="followsSpan">{{ $user->countFollowing }}</span></a>
                            <hr>
                            <a href="#" id="followersLink" data-url="/followers/{{ $user->id }}">Followers <span class="badge pull-right" id="followersSpan">{{ $user->countFollowers }}</span></a>
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
                                    <div>
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
@section('sripts')
    <script src="/js/project_upload.js"></script>
@endsection
