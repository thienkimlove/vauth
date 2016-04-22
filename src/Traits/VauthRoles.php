<?php

namespace Thienkimlove\Vauth\Traits;
use Thienkimlove\Vauth\Models\Role;

trait VauthRoles 
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Assign role to user.
     * @param $role
     * @return array
     */
    public function assignRole($role)
    {
        return $this->roles()->sync([Role::whereName($role)->firstOrFail()->id]);
    }

    /**
     * Accept 2 types of params : string 'manager' or collection of roles.
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }
}