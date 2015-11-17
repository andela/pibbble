<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Pibbble\Http\Controllers\Controller;

class SearchController extends Controller
{
    /*
     * Runs searches against projects and users
     */
    public function search()
    {
        $searchInput = Input::get('searchinput');

        if($searchInput) {
            $projects = DB::table('projects')->join('users', 'users.id', '=', 'projects.user_id');
            
            $results  = $projects->where('projectname', 'ILIKE', '%'. $searchInput .'%')
                                 ->orWhere('description', 'ILIKE', '%'. $searchInput .'%')
                                 ->orWhere('technologies', 'ILIKE', '%'. $searchInput .'%')
                                 ->orWhere('users.username', 'ILIKE', '%'. $searchInput .'%')
                                 ->get();
        } else {
            $results = [];
        }

        return view('search')->with('projects', $results);
    }
}
