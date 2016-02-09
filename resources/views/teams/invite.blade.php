@extends('layouts.master')
@section('title', 'Invite Teams')
@section('custom-css')
<link rel="stylesheet" href="{{ load_asset('css/teams.css') }}">
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

                        <td width="250px" class="fair-white">
                            <span id="facheck"><i class="fa fa-check fa-3x"></i></span>
                            <span id="oro">
                                <b class="block">Step 2</b><br>
                                <small>Set up the team</small>
                            </span>
                        </td>
                        <td width="250px">
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
                <form role="form" method="post" action="/teams/new">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="name">Search by username or email address:</label>

                    <input type="text" class="form-control typeahead" autocomplete="off" id="name" name="name" data-team={{ $team->name }}>
                  </div>
                </form>
                <hr class="team-line">
                <div class="invitees">
                    <div class="team-item">
                        <a href="{{ route('userprofile', $team->user->username) }}"><img src="{{ $team->user->getAvatar()}}"></a>
                        <div class="team-name">
                            <b><a href="{{ route('userprofile', $team->user->username) }}">{{ $team->user->username }}</a></b>
                        </div>
                    </div>
                </div>

                <br>
                <a href="{{ url('/teams/'.$team->name.'/dashboard') }}" class="btn btn-third btn-lg">Finish</a>
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
@section('custom_js')
    <script src={{ load_asset('js/invite.js') }}></script>
@endsection
