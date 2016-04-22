<?php

namespace Thienkimlove\Vauth;

use Illuminate\Contracts\Auth\Access\Gate;
use Thienkimlove\Vauth\Models\Permission;

class VauthRegistrar
{
    /**
     * @var Gate
     */
    protected $gate;

    /**
     * @param Gate       $gate
     * @param Repository $cache
     */
    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }

    /**
     *  Register the permissions.
     *
     * @return bool
     */
    public function registerPermissions()
    {
        foreach (Permission::with('roles')->get() as $permission) {
            $this->gate->define($permission->name, function ($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
    }
}
