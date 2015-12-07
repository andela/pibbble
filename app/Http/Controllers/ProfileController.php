<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Input;
use Cloudder;
use Redirect;
use Pibbble\User;
use Pibbble\Project;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Gets profile update page.
     *
     * @return Response
     */
    public function getProfileSettings()
    {
        return view('profile.settings');
    }

    /**
     * Gets selected user's dashboard.
     *
     * @return Response
     */
    public function show($username)
    {
        return view('projects.dashboard', ['user' => User::findByUsernameOrFail($username)]);
    }

    /**
     * Posts form request.
     *
     * @param  Request $request
     * @return Response
     */
    public function postProfileSettings(Request $request)
    {
        $input = $request->except('_token', 'url');
        User::find(Auth::user()->id)->updateProfile($input);

        return redirect('/profile/settings')->with('status', 'You have successfully updated your profile');
    }

    /**
     *  Posts image update request
     */
    public function postAvatarSetting(Request $request)
    {
        $img = Input::file('avatar');

        Cloudder::upload($img);
        $imgurl = Cloudder::getResult()['url'];

        User::find(Auth::user()->id)->updateAvatar($imgurl);

        return redirect('/profile/settings')->with('status', 'Avatar updated successfully');
    }
}
