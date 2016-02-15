<?php

namespace Pibbble;

use DB;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The table associated with this model.
     * @var string
     * */
    protected $table = 'teams';

    /**
     * The primary key field in the table.
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'plan', 'avatar', 'location', 'bio', 'skills'];

    /**
     * one to one relationship
     * @return string
     */
    public function user()
    {
        return $this->belongsTo('Pibbble\User');
    }

    public function projects()
    {
        return $this->hasMany('Pibbble\Project');
    }

    /**
     * Return top three projects of teams
     * @return [type] [description]
     */
    public function topThree()
    {
        return $this->projects()->latest()->limit(3)->get();
    }

    public function updateProfile($formData)
    {
        foreach ($formData as $key => $value) {
            $this->$key = $value;
        }

        $this->save();
    }

    public function updateAvatar($img)
    {
        $this->avatar = $img;

        $this->save();
    }

    public static function checkUserInTeam($team_id, $user_id)
    {
        $team = DB::table('team_members')->where('team_id', $team_id)->where('user_id', $user_id)->get();
        if ($team) {
            return true;
        }
        return false;
    }
}
