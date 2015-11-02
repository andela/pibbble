<?php

namespace Pibbble\Http\Controllers;

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
