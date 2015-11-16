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
    public function search()
    {
        $searchInput = Input::get('searchinput');

        if($searchInput) {
            $projects = DB::table('projects');
            $results = $projects->where('projectname', 'LIKE', '%'. $searchInput .'%')
              ->orWhere('description', 'LIKE', '%'. $searchInput .'%')
              ->orWhere('technologies', 'LIKE', '%'. $searchInput .'%')
              ->get();
        }
        //$results = $results::paginate(12);

        return view('search')->with('projects', $results);
    }
}
