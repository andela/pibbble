@extends('layouts.master')
@section('title', 'Meetups')

@section('content')
<div class="" style="min-height: 420px">
    <div class="cover-bg">
        <p class="cover-swords" style="color: #666666;"><strong>HANG OUT WITH OTHER DEVELOPERS</strong></p>
        <p class="cover-bwords"><strong>Host a Meetup</strong></p>
    </div>
    <div class="meetup-form">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-text">Want to host a Pibbble meetup? Fill the following...</div>
                <form action="/meetup" method="POST" class="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container">
                        <fieldset class="form-group">
                            <label class="">City</label>
                            <div class="">
                                <input type="text" class="input-field form-control" name="city" required>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="">Date & Time</label>
                            <div class="">
                                <input id="datetimepicker" type="text" name="date" class="date-input form-control">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="">Details</label>
                            <div class="">
                                <textarea type="text" class="form-control textarea-field" rows="3" name="event_details"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="">Organizer mailing address</label>
                            <div class="">
                                <textarea type="text" class="form-control textarea-field" rows="3" name="organizer_address"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="">Phone</label>
                            <div class="">
                                <input type="text" class="input-field form-control" name="phone_no" required>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label class=""></label>
                            <button type="submit" class="btn profile-button form-group">Submit Meetup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
