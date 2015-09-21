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
     * @return auth.blade.php
     */
    public function auth()
    {
        return view('auth');
    }

    /**
     * @return about.blade.php
     */
    public function about()
    {
        return view('about');
    }

    /**
     * @return terms.blade.php
     */
    public function terms()
    {
        return view('terms');
    }

    /**
     * @return help.blade.php
     */
    public function help()
    {
        return view('help');
    }

    /**
     * @return privacy.blade.php
     */
    public function privacy()
    {
        return view('privacy');
    }

    /**
     * @return contact.blade.php
     */
    public function contact()
    {
        return view('contact');
    }
}
