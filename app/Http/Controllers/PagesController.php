<?php

namespace Pibbble\Http\Controllers;

use Pibbble\Project;

class PagesController extends Controller
{
    /**
     * gets projects from db (Project Model)
     * orders the projects by time created in descending order
     * paginates the projects - 12 per page
     * passes the projects to the view (landing page)
     * @return view returns the landing page view (home.blade.php)
     */
    public function home()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(12);

        return view('landing', ['projects' => $projects]);
    }

    /**
     * @return [type] [description]
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
