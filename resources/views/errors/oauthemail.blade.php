@extends('layouts.master')

@section('title', 'OAuth-email Error')

@endsection

@section('content')

    <div class="error404">
        <h2 class="error">"The email is already being used."</h2>
        <h3 class="error-message">
            Try again with a github or twitter account with a different email or register an account
            <a href="/auth/register">here</a>.
        </h3>
    </div>

@endsection