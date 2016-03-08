@extends('layouts.master')
@section('title', 'Meetups')

@section('content')
@include('layouts.partials.alerts')
    <div class="container">
    @if (isset($meetups))
        @foreach ($meetups as $meetup)
            <div class="row pending-meetup">
                <div class="col-md-6 col-xs-12">
                    <img src="" class="pull-left meetup-image" />
                    <div class="meetup-details">
                        <strong>City: </strong>{{ $meetup->city }}<br>
                        <strong>Date: </strong>{{ $meetup->event_date }}<br>
                        <strong>Details: </strong>{{ $meetup->event_details }}<br>
                        <strong>Organizer Address: </strong>{{ $meetup->organizer_address }}<br>
                        <strong>Phone No: </strong>{{ $meetup->phone_no }}<br>
                    </div>
                </div>
            </div><br><br>
        @endforeach
    @endif
    </div>
@endsection
