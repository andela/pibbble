<?php

namespace Pibbble\Http\Controllers;

use DB;
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
        $user = User::findByUsernameOrFail($username);
        $user->following = $user->follows()->get();
        $user->followers = $user->followers()->get();
        $follow = $user->followers()->find(Auth::user()->id);

        if ($follow) {
            $user->follows = true;
        } else {
            $user->follows = false;
        }

        return view('projects.dashboard', ['user' => $user]);
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
        if (Auth::check()) {
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

    /**
     * Unfollow a user
     */
    public function unfollowUser($id)
    {
        if (Auth::check()) {
            $results = DB::delete('delete from user_follows where user_id = ? and follow_id = ?', [Auth::user()->id, $id]);
            if ($results == 1) {
                $user = User::find($id);
                $followers = $user->followers()->count();
                $count = [
                    "count" => $followers
                ];
                return response()->json($count);
            }
        }

        return response('Unauthorized.', 401);
    }
}
