<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    /**
     * @return welcome.blade.php
     */
    public function home()
    {
        return view('welcome');
    }

    /**
     * @return sign_up.blade.php
     */
    public function sign_up()
    {
        return view('sign_up');
    }

    /**
     * @return sign_in.blade.php
     */
    public function sign_in()
    {
        return view('sign_in');
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
}