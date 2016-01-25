@extends('layouts.master')
@section('title', 'All Teams')
@section('custom-css')
<link rel="stylesheet" href="{{ load_asset('css/teams.css') }}">
@endsection
@section('content')
<div class="container" style="min-height: 390px">
    <div class="text-center">
        <h3 class="header-grey"><b class="dudu">Teams</b> are organizations who share their designs, products, and jobs</h3>
    </div>
    <hr class="ash">
    <div class="row">
        <div class="col-md-9">
            <div class="col-md-2">
                <img src="http://placehold.it/80x80" class="team-pix">
            </div>
            <div class="col-md-4">
                <h5>Yellow <i class="fa fa-envelope hire"></i></h5>
                <p>Lagos, Nigeria</p>
                <small>ui, ux, android, games </small>
                <br>
                <i class="fa fa-plus-square fa-lg"></i>
                <p>450  |  54,201</p>
                <small> shots  | followers</small>
            </div>
            <div class="shots">

            </div>
        </div>
        <div class="col-sm-3">.col-sm-8</div>
    </div>
</div>
@endsection