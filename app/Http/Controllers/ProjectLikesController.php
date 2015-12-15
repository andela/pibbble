<?php

namespace Pibbble\Http\Controllers;

use DB;
use Auth;
use Pibbble\Project;
use Pibbble\ProjectLikes;

class ProjectLikesController extends Controller
{
    public function like($projectID)
    {
        $userID = Auth::user()->id;

        $result = ProjectLikes::where('project_id', '=', $projectID)->where('user_id', '=', $userID)->first();

        if(is_null($result)) {
            $projectlikes = new ProjectLikes();
            $projectlikes->project_id = $projectID;
            $projectlikes->user_id = $userID;
            $projectlikes->save();
        }
        else {
            $theLike = ProjectLikes::find($result->id);
            $theLike->delete();
        }

        $likes = DB::table('projects_likes')->where('project_id', '=', $projectID)->count();

        return response()->json($likes);
    }
}