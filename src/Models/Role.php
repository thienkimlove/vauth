<?php

namespace Thienkimlove\Vauth\Models;

use Illuminate\Database\Eloquent\Model;
use Thienkimlove\Vauth\Contracts\Role as RoleContracts;

class Role extends Model implements RoleContracts
{
    protected $fillable = ['name', 'label'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function addPermission($permission)
    {
        $this->permissions()->sync([$permission->id]);
    }
}
