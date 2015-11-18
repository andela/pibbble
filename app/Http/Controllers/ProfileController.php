<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Redirect;
use Pibbble\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Gets profile update page

    public function getProfileSettings()
    {
        return view('profile.settings');
    }

    // Posts form request

    public function postProfileSettings(Request $request)
    {
        $input = $request->except('_token', 'url');
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->updateProfile($input);

        return Redirect::back()->with('status', 'You have successfully updated your profile.');
    }
}
