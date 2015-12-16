<?php

namespace Pibbble\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    /**
     * Search for projects from the db.
     * @return view the search view (search.blade.php);
     */
    public function search()
    {
        $searchInput = Input::get('searchinput');

        /**
         * During testing, the db coneection is set to sqlite
         */
        $dbConnection = env('DB_CONNECTION', 'pgsql');
        $like = 'ILIKE';

        if (strcasecmp($dbConnection, 'sqlite') == 0) {
            $like = 'LIKE';
        }

        if ($searchInput) {
            $projects = DB::table('projects')->join('users', 'users.id', '=', 'projects.user_id');

            $results = $projects->where('projectname', $like, '%'.$searchInput.'%')
                                 ->orWhere('description', $like, '%'.$searchInput.'%')
                                 ->orWhere('technologies', $like, '%'.$searchInput.'%')
                                 ->orWhere('users.username', $like, '%'.$searchInput.'%')
                                 ->get();
        } else {
            $results = [];
        }

        return view('search')->with('projects', $results);
    }
}
