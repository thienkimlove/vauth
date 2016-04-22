<?php

namespace Thienkimlove\Vauth\Models;

use Illuminate\Database\Eloquent\Model;
use Thienkimlove\Vauth\Contracts\Permission as PermissionContracts;

class Permission extends Model implements PermissionContracts
{
    protected $fillable = ['name', 'label'];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
