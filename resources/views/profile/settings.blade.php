@extends('layouts.master')
@section('title', 'Profile Update')

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

<h3 class="tab-bar" style="text-align: center;"><strong>Update your profile settings</strong></h3>

<hr>
<div class="row">
    <div class="col-md-7 col-xs-12">
        <form class="form-horizontal container-margin" method="POST" action="/settings/profile">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="group container">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Skills</label>
                    <div class="col-sm-5">
                        <input type="text" name="skills" class="form-control" value="{{ Auth::user()->skills }}" placeholder="e.g. PHP, JS">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="{{ Auth::user()->location }}" name="location">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Github</label>
                    <div class="col-sm-5">
                        <input name="github" type="text" class="form-control" value="{{ Auth::user()->github }}" placeholder="e.g. rlerdorf">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Twitter</label>
                    <div class="col-sm-5 col-xs-12">
                        <input name="twitter" type="text" class="form-control" value="{{ Auth::user()->twitter }}" placeholder="e.g. jack">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Facebook</label>
                    <div class="col-sm-5">
                        <input name="facebook" type="text" class="form-control" value="{{ Auth::user()->facebook }}" placeholder="e.g. b.obama">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Linkedin</label>
                    <div class="col-sm-5">
                        <input name="linkedin" type="text" class="form-control" value="{{ Auth::user()->linkedin }}"  placeholder="e.g. bankimoon">
                    </div>
                </div>
                <fieldset class="form-group">
                    <label class="col-sm-2 control-label">Bio</label>
                    <div class="col-sm-5">
                        <textarea class="form-control custom-width" name="bio" rows="3">{{ Auth::user()->bio }}</textarea>
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
        <form method="POST" action="/avatar/setting" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div style="margin: 10px;">
                <div><b>Avatar</b></div>
                <br>
                <img src="{{ Auth::user()->avatar }}" height="125" width="125"/>
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
