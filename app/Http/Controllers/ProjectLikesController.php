<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\Project;

class ProjectLikesController extends Controller
{
    public function like($id)
    {
        var_dump($id);

        $projects = Project::orderBy('created_at', 'desc')->paginate(12);

        return view("landing");
    }
}