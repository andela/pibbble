<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Mail;
use Cloudder;
use Pibbble\User;
use Pibbble\Team;
use Pibbble\Project;
use Illuminate\Http\Request;
use Pibbble\Http\Requests;
use Illuminate\Database\QueryException;
use Pibbble\Http\Controllers\Controller;

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

        return view('teams.invite', ['team' => $team]);
    }

    /**
     * Get all users as json for an invites list suggestion
     * @return json allusers with their id's
     */
    public function invites()
    {
        $users = User::all(['id', 'username as name']);

        for ($i = 0; $i < count($users); $i++) {
            $users[$i]->avatar = $users[$i]->getAvatar();
        }

        return $users;
    }

    /**
     * Send an invite to a user and add them to a team
     *
     */
    public function sendInvite($team, $id)
    {
        $user = User::find($id);
        $team = Team::where('name', $team)->first();

        Mail::send('emails.teaminvite', compact('user', 'team'), function ($m) use ($user, $team) {
            $m->from(Auth::user()->email, Auth::user()->username);
            $m->to($user->email, $user->name);
            $m->subject('Invitation to join Team '. $team->name .' at Pibbble');
        });

        $user->teams()->save($team);
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
            $org = $team->name  = $request->input('name');
            $team->email = $request->input('email');
            $team->plan  = $request->input('options');
            $team->user_id = Auth::user()->id;

            $team->save();

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
     * Posts form request.
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
     *  Posts image update request.
     */
    public function updateAvatar(Request $request, $name)
    {
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');

            Cloudder::upload($img);
            $imgurl = Cloudder::getResult()['url'];

            $team = Team::where('name', $name)->first();

            $team->updateAvatar($imgurl);

            return redirect('/teams/'.$team->name.'/dashboard')->with('status', 'Avatar updated successfully.');
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
        //
    }

    /**
     * Check name availabilty
     * @param  Request $request
     * @return integer
     */
    public function checkName(Request $request)
    {
        $check = Team::where('name', $request->name)->first();

        if ($check) {
            return 200;
        }
    }
}
