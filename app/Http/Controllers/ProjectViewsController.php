<?php

namespace Pibbble\Http\Controllers;

use DB;
use Auth;
use Pibbble\Project;

class ProjectViewsController extends Controller
{
    public function view($projectID)
    {
        $project = Project::find($projectID);
        $project->views += 1;
        $project->save();

        return response()->json($project->views);
    }
}
