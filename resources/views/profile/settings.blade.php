@extends('master')
@section('title', 'Profile Settings')

@section('content')
<div>
    @if(session('status'))
        <div class="alert alert-success" style="text-align: center; margin-top: -20px;">
            {{ session('status') }}
        </div>
    @endif
</div>

<h3 class="tab-bar" style="text-align: center;"><strong>Update your profile settings</strong></h3>

<hr>
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal container-margin" method="POST" action="/profile/settings">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="group container">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="{{ Auth::user()->username }}" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="{{ Auth::user()->location }}" name="location">
                    </div>
                </div>
                <fieldset class="form-group">
                    <label for="" class="col-sm-2 control-label">Bio</label>
                    <div class="col-sm-2">
                        <textarea class="form-control custom-width" name="bio" rows="3">{{ Auth::user()->bio }}</textarea>
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <button type="submit" class="btn profile-button form-group button-center">Update Settings</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <div style="margin: 10px;">
            <div><b>Your Avatar</b></div>
            <br>
            <img src="/img/image.png" height="125" width="125"/>
            <input type="file" size="30"></input>
            <div>
                <br>
                <button type="submit" class="btn profile-button form-group button-center">Upload Photo</button>
            </div>
        </div>
    </div>
</div>

@endsection
