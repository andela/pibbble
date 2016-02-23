@extends('layouts.master')

@section('title', 'Team Dashboard')

@section('custom-css')
<link rel="stylesheet" href="{{ load_asset('css/teams.css') }}">
@endsection

@section('content')
    @include('teams.navbar')
    <div class="content">
        <div class="row col-md-12">
            <img class="img team-pix" width="100" height="100" src="{{ $team->getAvatar() }}">
        </div>
        <div class="row col-md-12">
            <h2 class="img">{{ $team->name }}</h2>
            <h4 class="img hire">{{ $team->location }}</h4>
            <h5 class="img">{{ $team->bio }}</h5>
        </div>
        @include('others.projects_grid')
    </div>
    @include('teams.dashboard_modal')
@endsection
@section('sripts')
    <script src="/js/project_upload.js"></script>
@endsection