<?php namespace App\Http\Controllers;
class PagesController extends Controller {

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