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
        $meetup->approved = false;

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

        $admins = explode(', ', env('ADMIN_EMAILS'));

        Mail::send('emails.meetup-created', compact('user', 'meetupDetails'), function ($message) use ($user, $admins) {
            $message->from(env('MAIL_USERNAME'), 'Pibble Team');
            $message->to($user->email)->subject('Your Pibble Meetup has been created');
            $message->cc($admins);
        });
    }

    public function getPendingMeetups()
    {
        $meetups = Meetup::where('approved', false)->get();

        return view('meetups.pending', ['meetups' => $meetups]);
    }

    public function getPendingMeetup($id)
    {
        $pendingMeetup = Meetup::where('approved', false)->find($id);

        return view('meetups.pending', ['pendingMeetup' => $pendingMeetup]);
    }

    public function approve($id)
    {
        $pendingMeetup = Meetup::get()->find($id);
        $pendingMeetup->approved = true;
        $pendingMeetup->save();

        $success = 'The meetup was successfully approved.';

        return redirect('/meetup/pending/'.$id)
            ->with([
                'success' => $success,
                'pendingMeetup' => $pendingMeetup,
            ]);
    }
}
