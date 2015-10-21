<?php

namespace Pibbble;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with this model
     * @var string
     */
    protected $table = 'projects';

    /**
     * The primary key field in the table
     * @var string
     */
    protected $primaryKey = 'project_id';

}
