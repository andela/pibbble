<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\User;
use Pibbble\Project;
use Pibbble\ProjectLikes;
use Illuminate\Http\Request;

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
     * Get links for sorted views based on query
     * @return popular views
     */
    public function getLinks(Request $request)
    {
        $link = ($request->query()['popular']) ?? 'views';
        $sort_type = ['comments' => 'comment_count',
                        'likes' => 'likes',
                        'views' => 'views'
                    ];
        $projects = Project::orderBy($sort_type[$link], 'desc')->paginate(12);
        $projects->setPath('/sort?popular='.$link.'&');

        return view('landing', ['projects' => $projects]);
    }

    public function developers()
    {
        $users = User::orderBy('id')->paginate(10);
        return view('developers', ['users' => $users]);
    }
}
