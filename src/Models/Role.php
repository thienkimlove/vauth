<?php

namespace Thienkimlove\Vauth\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
