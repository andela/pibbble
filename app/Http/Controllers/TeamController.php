<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\User;
use Pibbble\Team;
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
    public function show()
    {
        return view('teams.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
