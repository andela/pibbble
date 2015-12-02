@extends('layouts.master')
@section('title', 'Projects')
Dashboard
@endsection

@section('custom-css')
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('css/bootstrap-social.css') }}">
<!-- Resource style -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<!-- CSS reset -->
@endsection @section('content')
<div class="container-fluid ball" style="min-height: 420px;">
    <div class="container">
        <p>{{$user->username}}</p>
    </div>

</div>
@endsection
