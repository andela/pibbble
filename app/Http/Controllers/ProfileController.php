<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Cloudder;
use Redirect;
use Pibbble\User;
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
    public function updateProfileSettings(Request $request)
    {
        $input = $request->except('_token', 'url');
        User::find(Auth::user()->id)->updateProfile($input);

        return redirect('/profile/settings')->with('status', 'You have successfully updated your profile.');
    }

    /**
     *  Posts image update request.
     */
    public function postAvatarSetting(Request $request)
    {
        if ($request->hasFile('avatar')) {

            $img = $request->file('avatar');

            Cloudder::upload($img);
            $imgurl = Cloudder::getResult()['url'];

            User::find(Auth::user()->id)->updateAvatar($imgurl);

            return redirect('/profile/settings')->with('status', 'Avatar updated successfully.');
        } else {
            return redirect('/profile/settings')->with('status', 'Please select an image.');
        }
    }
}
