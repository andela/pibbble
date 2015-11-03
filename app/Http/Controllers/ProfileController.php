<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getProfileSettings()
    {
        return view('profile.settings');
    }

    public function postProfileSettings()
    {

    }
}
