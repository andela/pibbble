<?php

namespace Pibbble\Http\Controllers;

class PagesController extends Controller
{
    /**
     * @return welcome.blade.php
     */
    public function home()
    {
        return view('landing');
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
}
