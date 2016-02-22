<?php

namespace Pibbble\Http\Controllers;

use DB;
use Auth;
use Mail;
use Cloudder;
use Pibbble\User;
use Pibbble\Team;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::simplePaginate(15);

        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /*
    * Invite team members view
     */
    public function invite($name)
    {
        $team = Team::where('name', $name)->first();
        $members = $team->members()->get();

        return view('teams.invite', compact('team', 'members'));
    }

    /**
     * Get all users as json for an invites list suggestion.
     * @return json allusers with their id's
     */
    public function invites()
    {
        $users = User::all(['id', 'username as name', 'avatar']);

        for ($i = 0; $i < count($users); $i++) {
            $users[$i]->avatar = $users[$i]->getAvatar();
        }

        return $users;
    }

    /**
     * Send an invite to a user and add them to a team.
     */
    public function sendInvite($team, $id)
    {
        $user = User::find($id);
        $team = Team::where('name', $team)->first();

        Mail::send('emails.teaminvite', compact('user', 'team'), function ($m) use ($user, $team) {
            $m->from(Auth::user()->email, Auth::user()->username);
            $m->to($user->email, $user->name);
            $m->subject('Invitation to join Team '.$team->name.' at Pibbble');
        });

        $team->members()->save($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|min:3',
            'email'    => 'required|email',
        ]);

        try {
            $team = new Team;
            $org = $team->name = $request->input('name');
            $team->email = $request->input('email');
            $team->plan = $request->input('options');
            $team->user_id = Auth::user()->id;

            $team->save();
            $team->members()->save(Auth::user());

            return redirect()->to('/teams/'.$org.'/invite');
        } catch (QueryException $e) {
            return redirect()->back()->withInput(['name' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($team)
    {
        $team = Team::where('name', $team)->first();
        $projects = $team->projects()->orderBy('created_at', 'desc')->with('projectLikes')->with('comments')->paginate(12);

        return view('teams.dashboard', compact('team', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $team = Team::where('name', $name)->first();

        return view('teams.edit', compact('team'));
    }

    /**
     * Posts team settings/details.
     *
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $name)
    {
        $input = $request->except('_token', 'url');
        $team = Team::where('name', $name)->first();

        $this->validate($request, [
            'email'    => 'required',
        ]);

        $team->updateProfile($input);

        return redirect('/teams/'.$team->name.'/dashboard')->with('status', 'You have successfully updated your profile.');
    }

    /**
     *  Posts team avatar update request.
     */
    public function updateAvatar(Request $request, $name)
    {
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');

            Cloudder::upload($img);
            $imgurl = Cloudder::getResult()['url'];

            $team = Team::where('name', $name)->first();

            $team->updateAvatar($imgurl);

            return redirect('/teams/'.$team->name.'/settings')->with('status', 'Avatar updated successfully.');
        } else {
            return redirect('/teams/'.$team->name.'/settings')->with('status', 'Please select an image.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            Team::destroy($id);

            return redirect()->to('/teams');
        }

        return response('Unauthorized', 401);
    }

    /**
     * Check name availabilty.
     * @param  Request $request
     * @return int
     */
    public function checkName(Request $request)
    {
        $check = Team::where('name', $request->name)->first();

        if ($check) {
            return 200;
        }
    }

    /**
     * Follow a team.
     * @param  int $id id of the team being followed
     * @return json     follow count for the team
     */
    public function follow($id)
    {
        if (Auth::check()) {
            $team = Team::find($id);
            $team->followers()->save(Auth::user());
            $count = $team->followers()->count();

            return response()->json($count);
        }

        return response('Unauthorized', 401);
    }

    /**
     * Unfollow a team.
     * @param  int $id id of the team being unfollowed
     * @return json     follow count for the team
     */
    public function unfollow($id)
    {
        if (Auth::check()) {
            $results = DB::delete('delete from team_follows where user_id = ? and team_id = ?', [Auth::user()->id, $id]);
            $team = TEAM::find($id);
            $count = $team->followers()->count();

            return response()->json($count);
        }

        return response('Unauthorized', 401);
    }

    /**
     * Send email to team when hired.
     * @return void
     */
    public function hireTeam(Request $request)
    {
        $team = Team::find($request->input('id'));
        $team->message = $request->message;

        Mail::send('emails.hireteam', ['team' => $team], function ($m) use ($team) {
            $m->from(Auth::user()->email, Auth::user()->username);
            $m->to($team->email, $team->name)->subject('Team Hire Request from Pibbble');
        });
    }

    public function fromEmail($id)
    {
        $team = Team::findOrFail($id);
        return redirect('/teams/'.$team->name.'/dashboard');
    }
}
