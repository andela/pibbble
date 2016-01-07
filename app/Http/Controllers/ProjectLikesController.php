<?php

namespace Pibbble\Http\Controllers;

use DB;
use Auth;
use Pibbble\Project;
use Pibbble\ProjectLikes;

class ProjectLikesController extends Controller
{
    /**
     *  If a user "likes" a project, this method inserts a record representing the like into the database.
     *  The like is deleted if the user later "unlikes" the project.
     * @param  $projectID       [the id of the project liked]
     * @return response         [JSON response returned to the AJAX calling function]
     */
    public function like($projectID)
    {
        $userID = Auth::user()->id;

        $result = ProjectLikes::where('project_id', '=', $projectID)->where('user_id', '=', $userID)->first();

        if (is_null($result)) {
            $projectlikes = new ProjectLikes();
            $projectlikes->project_id = $projectID;
            $projectlikes->user_id = $userID;
            $projectlikes->save();

            //find the project, increment the likes by 1 and save it.
            $project = Project::find($projectID);
            $project->likes += 1;
            $project->save();
        } else {
            ProjectLikes::find($result->id)->delete();
            $project = Project::find($projectID);
            if ($project->likes > 0) {
                $project->likes -= 1;
            }

            $project->save();
        }

        $likes = DB::table('projects_likes')->where('project_id', '=', $projectID)->count();

        return response()->json($likes);
    }
}
