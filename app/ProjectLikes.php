<?php

namespace Pibbble;

use Illuminate\Database\Eloquent\Model;

class ProjectLikes extends Model
{
    /**
     * The table associated with this model.
     * @var string
     */
    protected $table = 'projects_likes';

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
    protected $fillable = ['project_id', 'user_id'];

    public function projects()
    {
        return $this->belongsTo('Pibbble\Project');
    }

    public function user()
    {
        return $this->belongsTo('Pibbble\User');
    }
}