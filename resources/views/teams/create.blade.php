@extends('layouts.master')

@section('title', 'Create Teams')

@section('custom-css')
<link rel="stylesheet" href="{{ load_asset('css/teams.css') }}">
@endsection

@section('custom_js')
<script type="text/javascript" src="{{ load_asset('js/team.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="box">
                <b class="pre-head">PIBBBLE FOR</b>
                <h1>Teams</h1>
            </div>
            <div class="container">
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="250px" class="fair-white">
                            <span id="facheck"><i class="fa fa-check fa-3x"></i></span>
                            <span id="oro">
                                <b class="block">Completed</b><br>
                                <small>Set up a personal account</small>
                            </span>
                        </td>
                        <td width="250px">
                            <span id="facheck"><i class="fa fa-users fa-3x"></i></span>
                            <span id="oro">
                                <b class="block">Step 2</b><br>
                                <small>Set up the team</small>
                            </span>
                        </td>
                        <td class="fairer-white" width="250px">
                            <span id="facheck"><i class="fa fa-puzzle-piece fa-3x"></i></span>
                            <span id="oro">
                                <b class="block">Step 3</b><br>
                                <small>Invite Others</small>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="plan">
                <h4>What is your development team working on?</h4>
                <p>Promote your team and its work, build a following for your products, and hire developers.</p>
                <hr>
                @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
                <form role="form" method="post" action="/teams/new">
                  <div class="form-group">
                    <label for="name">Team Name:</label><span id="error" class="error_msg"></span>
                    <input type="text" class="form-control" id="team_name" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Billing Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-second active btn-xlg">
                        <input type="radio" name="options" id="option1" value="Basic">Basic<br>
                        <small class="cost"> $0/month </small>
                    </label>
                    <label class="btn btn-second btn-xlg">
                        <input type="radio" name="options" id="option2" value="Gold">Gold<br>
                        <small class="cost"> $25/month </small>
                    </label>
                    <label class="btn btn-second btn-xlg">
                        <input type="radio" name="options" id="option3" value="Platinum">Platinum<br>
                        <small class="cost"> $50/month </small>
                    </label>
                </div>
                  <br>
                  <br>
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                  <input type="submit" id="creatTeam" class="btn btn-third btn-lg" value="Create team">
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            <a href="/help">
            <div class="well right">
                <h5>Questions about Teams?</h5>
                <p>Visit our Help Center for more info</p>
            </div>
            </a>
            <hr class="black">
            <h4>Popular Teams</h4>
        </div>
    </div>
</div>
@endsection
