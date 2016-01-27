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
        $user->me = false;

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

        $this->validate($request, [
            'username' => 'required|unique:users,username,'.Auth::user()->id
        ]);

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
    public function followUser($id, $me)
    {
        if (Auth::check()) {
            $user = User::find($id);
            $follow = Auth::user()->follows()->save($user);

            if ($me == 1) {
                $follows = Auth::user()->follows()->count();
            } else if ($me == 0) {
                $follows = User::find($id)->followers()->count();
            }

            $count = [
                "count" => $follows
            ];

            return response()->json($count);
        }

        return response('Unauthorized.', 401);
    }

    /**
     * Unfollow a user
     */
    public function unfollowUser($id, $me)
    {
        if (Auth::check()) {
            $results = DB::delete('delete from user_follows where user_id = ? and follow_id = ?', [Auth::user()->id, $id]);
            if ($results == 1) {
                if ($me == 1) {
                    $follows = Auth::user()->follows()->count();
                } else {
                    $follows = User::find($id)->followers()->count();
                }

                $count = [
                    "count" => $follows
                ];

                return response()->json($count);
            }
        }

        return response('Unauthorized.', 401);
    }

    /**
     * Get followers of a user
     */
    public function getFollowers($id)
    {
        $followers = User::find($id)->followers()->get();

        for ($i = 0; $i < count($followers); $i++) {
            $followers[$i]->avatar = $followers[$i]->getAvatar();
            $followers[$i]->checkFollow = false;
            $followers[$i]->me = false;
            if (Auth::check()) {
                $followers[$i]->checkFollow = $followers[$i]->checkFollow();

                if ($followers[$i]->id == Auth::user()->id) {
                    $followers[$i]->me = true;
                }
            } else {
                $followers[$i]->me = true;
            }
        }

        return response()->json($followers);
    }

    /**
     * Get Followings of a user
     */
    public function getFollows($id)
    {
        $followers = User::find($id)->follows()->get();

        for ($i = 0; $i < count($followers); $i++) {
            $followers[$i]->avatar = $followers[$i]->getAvatar();
            $followers[$i]->checkFollow = false;
            $followers[$i]->me = false;

            if (Auth::check()) {
                $followers[$i]->checkFollow = $followers[$i]->checkFollow();
                $followers[$i]->me = false;

                if ($followers[$i]->id == Auth::user()->id) {
                    $followers[$i]->me = true;
                }
            } else {
                $followers[$i]->me = true;
            }
        }

        return response()->json($followers);
    }
}
