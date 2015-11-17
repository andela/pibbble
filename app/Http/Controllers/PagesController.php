<?php

namespace Pibbble\Http\Controllers;

use DB;

class PagesController extends Controller
{
    /**
     * @return landing.blade.php
     */
    public function home()
    {
        $projects =
            DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->select('users.name', 'projects.id', 'projects.projectname', 'projects.description', 'projects.url', 'projects.views', 'projects.likes')
            ->paginate(12);

        return view('landing', ['projects' => $projects]);
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
