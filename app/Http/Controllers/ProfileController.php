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
        // $user = User::findByUsernameOrFail($username);
        // $user->following = $user->follows()->get();
        // $user->followers = $user->followers()->get();
        // echo '<pre>'.print_r($user, true);

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

        return redirect('/settings/profile')->with('status', 'You have successfully updated your profile.');
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

            return redirect('/settings/profile')->with('status', 'Avatar updated successfully.');
        } else {
            return redirect('/settings/profile')->with('status', 'Please select an image.');
        }
    }

    /**
     * Follow a user
     */
    public function followUser($id)
    {
        if (\Auth::check()) {
            $user = User::find($id);
            $follow = Auth::user()->follows()->save($user);
            $followers = $user->followers()->count();
            $count = [
                "count" => $followers
            ];

            return response()->json($count);
        }

        return response('Unauthorized.', 401);
    }
}
