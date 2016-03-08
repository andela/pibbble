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
        $meetupDetails = [
            'city'              => $meetup->city,
            'date'              => $meetup->event_date,
            'details'           => $meetup->event_details,
            'organiserAddress'  => $meetup->organizer_address,
            'phoneNumber'       => $meetup->phone_no,
        ];

        $user = Auth::user();
        $admins = explode(', ', env('ADMIN_EMAILS'));

        Mail::send('emails.meetup-created', compact('user', 'meetupDetails'), function ($message) use ($user, $admins) {
            $message->from(env('MAIL_USERNAME'), 'Pibble Team');
            $message->to($user->email)->subject('Your Pibble Meetup has been created');
            $message->cc($admins);
        });
    }

    public function getPendingMeetups()
    {
        if ($this->isMeetupAdmin(Auth::user())) {
            $meetups = Meetup::where('approved', false)->get();

            return view('meetups.pending', ['meetups' => $meetups]);
        }

        return view('errors.access_denied');
    }

    /**
     * Returns a pending meetup retrieved by id.
     * @param  $id  The meetup's id
     * @return Pending meetup view, or 'access denied' view if unauthorised
     */
    public function getPendingMeetup($id)
    {
        if ($this->isMeetupAdmin(Auth::user())) {
            $pendingMeetup = Meetup::where('approved', false)->find($id);

            return view('meetups.pending', ['pendingMeetup' => $pendingMeetup]);
        }

        return view('errors.access_denied');
    }

    public function getApprovedMeetups()
    {
        $meetups = Meetup::where('approved', true)->get();

        return view('meetups.approved', ['meetups' => $meetups]);
    }

    /**
     *  Changes a meetup's status from 'pending' to 'approved'.
     * @param  int $id  Meetup id
     * @return void
     */
    public function approve($id)
    {
        if ($this->isMeetupAdmin(Auth::user())) {
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

        return view('errors.access_denied');
    }

    /**
     * Checks if the user is authorised to administer meetups.
     * @param  User    $user the logged-in user
     * @return bool  true if authorised; false otherwise
     */
    public function isMeetupAdmin(User $user)
    {
        $admin_emails = explode(', ', env('ADMIN_EMAILS'));

        // the user is a meetup admin or has site-wide admin status
        if ($user->hasRole('meetup-admin') || in_array($user->email, $admin_emails)) {
            return true;
        }

        return false;
    }
}
