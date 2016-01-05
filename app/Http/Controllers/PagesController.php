<?php

namespace Pibbble\Http\Controllers;

use Pibbble\Project;
use Pibbble\ProjectLikes;

class PagesController extends Controller
{
    /**
     * gets projects from db (Project Model)
     * orders the projects by time created in descending order
     * paginates the projects - 12 per page
     * passes the projects to the view (landing page).
     * @return view returns the landing page view (home.blade.php)
     */
    public function home()
    {
        $projects = Project::orderBy('created_at', 'desc')->with('projectLikes')->with('comments')->paginate(12);

        return view('landing')->withProjects($projects);
    }

    /**
     * handles the about route.
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
    protected function comments()
    {
        return Project::orderBy('created_at', 'desc')->paginate(12);
    }

    /**
     * @return views.blade.php
     */
    protected function views()
    {
        return Project::orderBy('views', 'desc')->paginate(12);
    }

    /**
     * @return likes.blade.php
     */
    protected function likes()
    {
        return Project::orderBy('likes', 'desc')->paginate(12);
    }

    public function getLinks($link)
    {
        $projects = null;

        if ($link == 'comments') {
            $projects = $this->comments();
        } elseif ($link == 'views') {
            $projects = $this->views();
        } elseif ($link == 'likes') {
            $projects = $this->likes();
        }

        return view('pages.links', ['projects' => $projects]);
    }
}
