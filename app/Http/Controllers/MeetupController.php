<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Mail;
use Pibbble\Meetup;
use Pibbble\User;
use Illuminate\Http\Request;

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
     * Returns FAQ page for meetups.
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
     * Then sends an email alerting admin of the creation.
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
        }

        return redirect()->back();
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

        Mail::send('emails.meetup-created', compact('user', 'meetupDetails'), function ($m) use ($user) {
            $m->from($user->email, $user->username);
            $m->to($user->email, $user->name)->subject('Your Pibble Meetup has been created (Test)');
        });
    }
}
