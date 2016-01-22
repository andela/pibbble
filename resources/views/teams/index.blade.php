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
        <div class="col-sm-9">
            <div class="info">
                <img src="">
            </div>
            <div class="shots">

            </div>
        </div>
        <div class="col-sm-3">.col-sm-8</div>
    </div>
</div>
@endsection