@extends('layouts.master')
@section('title', 'Pending Meetups')

@section('content')
    @foreach ($meetups as $meetup)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <strong>City: </strong>{{ $meetup->city }}<br>
                <strong>Date: </strong>{{ $meetup->event_date }}<br>
                <strong>Details: </strong>{{ $meetup->event_details }}<br>
                <strong>Organizer Address: </strong>{{ $meetup->organizer_address }}<br>
                <strong>Phone No: </strong>{{ $meetup->phone_no }}<br><br>  @can('approve-meetup')
                    <button class="btn btn-success">Edit Status</button>
                @endcan
            </div>
        </div>
    </div>
    @endforeach
@endsection