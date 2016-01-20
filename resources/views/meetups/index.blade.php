@extends('layouts.master')
@section('title', 'Meetups')

@section('content')
<div class="" style="min-height: 420px">
    <div class="cover-bg">
        <p class="cover-swords">HANG OUT WITH OTHER DEVELOPERS</p>
        <p class="cover-bwords">Host a Meetup</p>
    </div>
    <div class="meetup-form">
        <form>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</div>
@endsection
