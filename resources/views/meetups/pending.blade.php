@extends('layouts.master')
@section('title', 'Pending Meetups')

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
                        @can('approve-meetup')
                            <a href="/meetup/pending/{{ $meetup->id }}" class="btn btn-info pull-right">Edit Status</a>
                        @endcan
                    </div>
                </div>
            </div><br><br>
        @endforeach
    @endif

    @if (isset($pendingMeetup))
        <div class="row pending-meetup">
            <div class="col-md-6 col-xs-12">
                <img src="" class="pull-left meetup-image" />
                <div class="meetup-details">
                    <strong>City: </strong>{{ $pendingMeetup->city }}<br>
                    <strong>Date: </strong>{{ $pendingMeetup->event_date }}<br>
                    <strong>Details: </strong>{{ $pendingMeetup->event_details }}<br>
                    <strong>Organizer Address: </strong>{{ $pendingMeetup->organizer_address }}<br>
                    <strong>Phone No: </strong>{{ $pendingMeetup->phone_no }}<br>
                    @can('approve-meetup')
                        <form id="approveMeetup" role="form" method="POST" action="/meetup/approve/{{ $pendingMeetup->id }}">
                            {!! csrf_field() !!}
                            <input class="btn btn-success pull-right" type="submit" value="Approve" />
                        </form>
                    @endcan
                </div>
            </div>
        </div><br><br>
    @endif
    </div>
@endsection
