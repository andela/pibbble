<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\Meetup;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Meetup $meetup)
    {
        /**
         * Creates and stores new meetups.
         * Redirects to another page on successful creation.
         */
        $meetup->city = $request->city;
        $meetup->event_date = $request->event_date;
        $meetup->event_details = $request->event_details;
        $meetup->organizer_address = $request->organizer_address;
        $meetup->phone_no = $request->phone_no;
        $meetup->user_id = Auth::user()->id;

        $meetup->save();

        return redirect()->back();
    }
}
