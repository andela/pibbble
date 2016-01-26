<?php

namespace Pibbble\Http\Controllers;

use Illuminate\Http\Request;
use Pibbble\Http\Requests;
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
    public function create()
    {
        //
    }
}
