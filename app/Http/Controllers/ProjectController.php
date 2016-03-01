<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Cloudder;
use Pibbble\Team;
use Pibbble\User;
use Pibbble\Project;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class ProjectController extends Controller
{
    /**
     * @var string name of image in local
     */
    private $fileName;

    /**
     * @var string url returned from database
     */
    private $finalUrl;

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
        $user = Auth::user();
        $user->countFollowing = $user->follows()->count() + $user->teamFollows()->count();
        $user->countFollowers = $user->followers()->count();
        $user->me = true;

        $projects = Project::orderBy('created_at', 'desc')->personal()->get();

        return view('projects.dashboard')->withProjects($projects)->withUser($user);
    }

    /**
     * This method saves the image to cloudinary.
     * @param  string $name_of_screenshot
     * @return void
     */
    private function saveToCloud($name_of_screenshot)
    {
        $this->fileName = 'screenshots/'.$name_of_screenshot.'.jpg';
        Cloudder::upload($this->fileName);
        $this->finalUrl = Cloudder::getResult()['url'];
    }

    /**
     * This method converts url to images.
     * @return string
     */
    private function convertUrlToPng(Request $request)
    {
        $name_of_screenshot = uniqid();
        $browsershot = new Browsershot();
        $browsershot
            ->setURL($request->input('project_url'))
            ->setWidth('1024')
            ->setHeight('768')
            ->save('screenshots/'.$name_of_screenshot.'.jpg');

        return $name_of_screenshot;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'project_url'    => 'required|unique:projects:validurl',
            ]);

            return;
        }

        $this->validate($request, [
            'name'          => 'required|min:1',
            'description'   => 'required|min:15',
            'technologies'  => 'required',
            'project_url'    => 'required|unique:projects|url',
        ]);

        $getScreenshotName = $this->convertUrlToPng($request);
        $this->saveToCloud($getScreenshotName);

        $project = new Project;
        $project->user_id = Auth::user()->id;
        $project->projectname = $request->input('name');
        $project->description = $request->input('description');
        $project->technologies = $request->input('technologies');
        $project->image_url = $this->finalUrl;
        $project->project_url = $request->input('project_url');

        $project->save();

        return redirect()->to('/projects')->with('info', 'Your Project has been created successfully');
    }

    /**
     * Store Team projects.
     * @return [type] [description]
     */
    public function storeteam(Request $request, $team)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'project_url'    => 'required|unique:projects|validurl',
            ]);

            return;
        }

        $this->validate($request, [
            'name'          => 'required|min:1',
            'description'   => 'required|min:15',
            'technologies'  => 'required',
            'project_url'    => 'required|unique:projects|url',
        ]);

        $team = Team::where('name', $team)->first();

        $getScreenshotName = $this->convertUrlToPng($request);
        $this->saveToCloud($getScreenshotName);

        $project = new Project;
        $project->user_id = Auth::user()->id;
        $project->team_id = $team->id;
        $project->projectname = $request->input('name');
        $project->description = $request->input('description');
        $project->technologies = $request->input('technologies');
        $project->image_url = $this->finalUrl;
        $project->project_url = $request->input('project_url');

        $project->save();

        return redirect()->to('/teams/'.$team->name.'/dashboard')->with('info', 'Your Project has been created successfully');
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
        $project = Project::findOrFail($id);
        $this->validate($request, [
            'projectname'   => 'min:1',
            'description'   => 'min:15',
            'technologies'  => 'min:1',
            'project_url'    => 'url',
        ]);

        $input = $request->all();
        $project->fill($input)->save();

        return redirect()->to('/projects')->with('info', 'Your Project has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->to('/projects')->with('info', 'Project deleted successfully');
    }

    /**
     * Confirm before delete view.
     * @return confirm.blade.php
     */
    public function confirm($id)
    {
        $project = Project::findOrFail($id);

        return view('others.confirm')->withProject($project);
    }

    /**
     * Gets the project meta and returns a JSON response.
     *
     * @param int $id
     * @return \Illuminate\Http\JSONResponse
     */
    public function getMetaAsJSON($id)
    {
        return Project::select('projectname', 'description', 'technologies', 'image_url')->findOrFail($id)->toJson();
    }
}
