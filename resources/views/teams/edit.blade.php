@extends('layouts.master')
@section('title', 'Team Profile Update')

@section('content')
<div>
    @if(session('status'))
        <div class="alert alert-success" style="text-align: center; margin-top: -20px;">
            {{ session('status') }}
        </div>
    @endif
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger" style="text-align: center; margin-top: -20px;">
        <ul style="list-style:none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3 class="tab-bar" style="text-align: center;"><strong>Update your team profile settings</strong></h3>

<hr>
<div class="row">
    <div class="col-md-7 col-xs-12">
        <form class="form-horizontal container-margin" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="group container">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Team Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="{{ $team->name }}" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Skills</label>
                    <div class="col-sm-5">
                        <input type="text" name="skills" class="form-control" value="{{ $team->skills }}" placeholder="e.g. PHP, JS">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" class="form-control" value="{{ $team->email }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="{{ $team->location }}" name="location">
                    </div>
                </div>
                <fieldset class="form-group">
                    <label class="col-sm-2 control-label">Bio</label>
                    <div class="col-sm-5">
                        <textarea class="form-control custom-width" name="bio" rows="3">{{ $team->bio }}</textarea>
                    </div>
                </fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <button type="submit" class="btn profile-button form-group button-center">Update Settings</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <form method="POST" action="teams/avatar/setting" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div style="margin: 10px;">
                <div><b>Avatar</b></div>
                <br>
                <img src="{{ $team->avatar }}" height="125" width="125"/>
                <input type="file" name="avatar" size="30"></input>
                <div>
                    <br>
                    <button type="submit" class="btn profile-button form-group button-center">Upload Photo</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
