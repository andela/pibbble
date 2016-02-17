<?php

namespace Pibbble;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    
    public function addPermission(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
