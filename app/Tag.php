<?php

namespace Pibbble;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function projects()
    {
        $this->belongsToMany("Pibble\Project");
    }
}
