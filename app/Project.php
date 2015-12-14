<?php

namespace Pibbble;

use Auth;
use Pibbble\Comment;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with this model.
     * @var string
     * */
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

    /**
     * many to one relationship
     * many project.
     * @return string
     */
    public function user()
    {
        return $this->belongsTo('Pibbble\User');
    }

    public function tags()
    {
        return $this->belongsToMany('Pibble\Tag');
    }

    public function comments()
    {
        return $this->hasMany('Pibbble\Comment');
    }
}
