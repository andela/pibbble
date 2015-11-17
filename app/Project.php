<?php

namespace Pibbble;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with this model.
     * @var string
     */
    protected $table = 'projects';

    /**
     * The primary key field in the table.
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     *  The attributes that are mass assignable.
     * @var array
     * */
    protected $fillable = ['projectname', 'description', 'technologies', 'url'];

    /**
     * Set scope for personal info.
     * @param  string
     * @return string
     */
    public function scopePersonal($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
