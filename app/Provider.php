<?php

namespace Pibbble;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'providers';

    public function users()
    {
        return $this->belongsToMany('Pibbble\User', 'user_providers', 'provider_id', 'user_id');
    }
}
