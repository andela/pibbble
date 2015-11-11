@extends('layouts.master')
@section('title', 'OAuth-name Error')
@endsection
@section('content')
<div class="container">
    <div align="center" class="row">
        <div class="mui-panel width_400 padding_40">
        <legend align="left">
            We'll need a username.
        </legend>
        <form method="POST" action="/errors/oauthname">
            {{ csrf_field() }}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{  $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mui-form-group">
                <input type="text" class="mui-form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
            </div>
            <div align="left" class="mui-form-group">
                <input type="submit" class="mui-btn" value="Submit" name="register">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection