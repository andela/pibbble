<?php

namespace Pibbble;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with this model.
     * @var string
     */
    protected $table = 'project_comments';

    /**
     * The primary key field in the table.
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     *  The attributes that are mass assignable.
     * @var array
     * */
    protected $fillable = ['comment'];

    public function project()
    {
        return $this->belongsTo('Pibbble\Project');
    }

    public function user()
    {
        return $this->belongsTo('Pibbble\User');
    }
}
