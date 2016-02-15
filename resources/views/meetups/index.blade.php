@extends('layouts.master')
@section('title', 'Meetups')

@section('content')
<div style="min-height: 420px">
    <div class="cover-bg">
        <p class="cover-swords"><strong>HANG OUT WITH OTHER DEVELOPERS</strong></p>
        <p class="cover-bwords"><strong>Host a Meetup</strong></p>
    </div>
    <div class="meetup-form">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3 class="form-text">Want to host a Pibbble meetup? Here's how..</h3>
                <h3><i class="fa fa-question-circle"></i> Read our Meetup FAQ.</h3>
                <p style="padding-left:28px;">You have questions, we have answers. The best way to learn more about hosting
                    Pibbble Meetups is to read <a href="faq" >our FAQ.</a><p>
                <form action="/meetup/new" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container">
                        <fieldset class="form-group">
                            <label>City</label>
                            <div>
                                <input type="text" class="input-field form-control" name="city" required>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Date &amp; Time</label>
                            <div>
                                <input id="datetimepicker" type="text" name="event_date" class="date-input form-control" onblur="checkDateTime();" required>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Details</label>
                            <div>
                                <textarea type="text" class="form-control textarea-field" rows="3" name="event_details"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Organizer mailing address</label>
                            <div>
                                <textarea type="text" class="form-control textarea-field" rows="3" name="organizer_address"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Phone</label>
                            <div>
                                <input type="text" class="input-field form-control" name="phone_no" required>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn profile-button form-group">Submit Meetup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ load_asset('/js/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ load_asset('/js/datetime.js') }}"></script>>
@endsection