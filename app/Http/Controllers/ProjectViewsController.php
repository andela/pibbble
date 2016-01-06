<?php

namespace Pibbble\Http\Controllers;

use Pibbble\Project;

class ProjectViewsController extends Controller
{
    public function view($projectID)
    {
        $project = Project::find($projectID);
        $project->views += 1;
        $project->save();

        $views = Project::find($projectID)->views;

        return response()->json($views);
    }
}
