@extends('layouts.master')

@section('title', 'Error 404')

@endsection

@section('content')

    <div class="error404" style="min-height: 160px">
        <h2 class="error">Sorry, this page isn't available</h2>
        <h3 class="error-message">
            The link you followed may be broken, or the page may have been removed.
        </h3>
    </div>

@endsection
