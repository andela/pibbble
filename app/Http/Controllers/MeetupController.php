<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Mail;
use Pibbble\Meetup;
use Pibbble\User;
use Pibbble\Http\Requests;
use Illuminate\Http\Request;
use Pibbble\Http\Controllers\Controller;

class MeetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meetups.index');
    }

    /**
     * Returns FAQ page for meetups
     *
     * @return FAQ view
     */
    public function faq()
    {
        return view('meetups.faq');
    }

    /**
     * Creates and stores new meetups.
     * Redirects to another page on successful creation.
     * Then sends an email alerting admins of the creation.
     */
    public function create(Request $request, Meetup $meetup)
    {

        $meetup->city = $request->city;
        $meetup->event_date = $request->event_date;
        $meetup->event_details = $request->event_details;
        $meetup->organizer_address = $request->organizer_address;
        $meetup->phone_no = $request->phone_no;
        $meetup->user_id = Auth::user()->id;

        if ($meetup->save()) {
            $this->sendEmailOnMeetupCreation($meetup);
            $message = 'Your meetup creation was successful. '
                .'A confirmation email will be sent to you on approval.';

            return redirect('/meetup/faq')->with('success', $message);
        }
    }

    public function sendEmailOnMeetupCreation(Meetup $meetup)
    {
        $user = Auth::user();
        $meetupDetails = [
            'city'              => $meetup->city,
            'date'              => $meetup->event_date,
            'details'           => $meetup->event_details,
            'organiserAddress'  => $meetup->organizer_address,
            'phoneNumber'       => $meetup->phone_no,
        ];

        $recipients = explode(', ', env('ADMIN_EMAILS'));
        $recipients[] = $user->email;

        Mail::send('emails.meetup-created', compact('user', 'meetupDetails'), function ($message) use ($user, $recipients) {
            $message->from($user->email, $user->username);
            $message->to($recipients)->subject('Your Pibble Meetup has been created');
        });
    }
}
