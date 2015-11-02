@extends('master')
@section('title', 'Profile Settings')

@section('content')
<h3 class="tab-bar" style="text-align: center;"><strong>Update your profile settings</strong></h3>

<hr>
<div class="row">
<div class="col-md-6">
    <form class="form-horizontal container-margin">
        <div class="group container">
            <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="name" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="username" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" name="email" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">URL</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="url" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Location</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="location" placeholder="">
                </div>
            </div>
            <fieldset class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Bio</label>
                <div class="col-sm-2">
                    <textarea class="form-control custom-width" name="bio" rows="3"></textarea>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label"></label>
                <button type="button" class="btn profile-button form-group button-center">Update Settings</button>
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
            <button type="button" class="btn profile-button form-group button-center">Upload Photo</button>
        </div>
    </div>
</div>
</div>

@endsection
