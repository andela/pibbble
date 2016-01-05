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

        /*
         * Like is dependant on which db is being used
         * LIKE for every other db except pgsql
         * ILIKE for pgsql - used for case insensitive search
         */
        $like = 'ILIKE';

        if ($this->checkSqliteConnection()) {
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

    /**
     * Chek if detabase connection is using sqlite.
     * @return bool true if connection used is sqlite, false otherwise
     */
    private function checkSqliteConnection()
    {
        if (env('DB_CONNECTION') === 'sqlite') {
            return true;
        }

        return false;
    }
}
