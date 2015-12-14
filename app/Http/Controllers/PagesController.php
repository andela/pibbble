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
     * handles the about route
     * @return view the about page view (about.blade.php)
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

    /**
     * @return comments.blade.php
     */
    public function comments()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(12);

        return view('pages.comments', ['projects' => $projects]);
    }

    /**
     * @return views.blade.php
     */
    public function views()
    {
       $projects = Project::orderBy('views', 'desc')->paginate(12);

        return view('pages.views', ['projects' => $projects]);
    }
    /**
     * @return likes.blade.php
     */
    public function likes()
    {
        $projects = Project::orderBy('likes', 'desc')->paginate(12);

        return view('pages.likes', ['projects' => $projects]);
    }
}
