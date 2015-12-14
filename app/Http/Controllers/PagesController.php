<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\User;
use Pibbble\Comment;
use Pibbble\Project;

class PagesController extends Controller
{
    /**
     * @return landing.blade.php
     */
    public function home()
    {
        $user     = Auth::user();
        $projects = Project::orderBy('created_at', 'desc')->with('comments')->paginate(12);

        return view('landing', ['projects' => $projects])->withUser($user);
    }

    /**
     * @return about.blade.php
     */
    public function about()
    {
        return view('about');
    }

    /**
     * @return contact.blade.php
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * @return terms.blade.php
     */
    public function terms()
    {
        return view('terms');
    }

    /**
     * @return privacy.blade.php
     */
    public function privacy()
    {
        return view('privacy');
    }

    /**
     * @return help.blade.php
     */
    public function help()
    {
        return view('help');
    }

    public function getDashboard()
    {
    }
}
