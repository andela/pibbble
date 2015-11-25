<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Input;
use Cloudder;
use Redirect;
use Pibbble\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Gets profile update page.
=======
    
    /**
     * Gets profile update page
>>>>>>> 1d1a6f0... [Pibbble][#108779138] Update ProfileController
=======
    /**
     * Gets profile update page.
>>>>>>> 2216b17... [Pibbble][#108779138] Apply fixes from StyleCI
     * 
     * @return Response
     */
    public function getProfileSettings()
    {
        return view('profile.settings');
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Posts form request.
=======
     * Posts form request
>>>>>>> 1d1a6f0... [Pibbble][#108779138] Update ProfileController
=======
     * Posts form request.
>>>>>>> 2216b17... [Pibbble][#108779138] Apply fixes from StyleCI
     * 
     * @param  Request $request
     * @return Response           
     */
    public function postProfileSettings(Request $request)
    {
        $input = $request->except('_token', 'url');
        User::find(Auth::user()->id)->updateProfile($input);

        return redirect('/profile/settings')->with('status', 'You have successfully updated your profile.');
    }

    // Posts image update request

    public function postAvatarSetting(Request $request)
    {
        $img = Input::file('avatar');

        Cloudder::upload($img);
        $imgurl = Cloudder::getResult()['url'];

        User::find(Auth::user()->id)->updateAvatar($imgurl);

        return redirect('/profile/settings')->with('status', 'Avatar updated successfully.');
    }
}
