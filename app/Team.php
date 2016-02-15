<?php

namespace Pibbble;

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
}
