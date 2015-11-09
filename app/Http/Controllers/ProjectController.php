<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index page of the projects.
     * @return dashboard.blade.php
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();

        return view('projects.dashboard', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'projname'     => 'required|min:5',
            'projdesc'     => 'required|min:15',
            'projtech'     => 'required',
            'projurl'      => 'required|url',
        ]);

        $project = new Project;
        $project->user_id = Auth::user()->id;
        $project->projectname = $request->input('projname');
        $project->description = $request->input('projdesc');
        $project->technologies = $request->input('projtech');
        $project->url = $request->input('projurl');

        $project->save();

        return redirect()->to('/projects/dashboard')->with('info', 'Your Project has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
