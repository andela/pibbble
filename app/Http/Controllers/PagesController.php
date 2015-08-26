<?php namespace App\Http\Controllers;
class PagesController extends Controller {
  public function home()
  {
    return view('welcome');
  }
  public function authentication()
  {
    return view('authentication');
  }
}