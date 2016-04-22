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
        try {
            foreach ($this->getPermissions() as $permission) {
                $this->gate->define($permission->name, function ($user) use ($permission) {
                    return $user->hasRole($permission->roles);
                });
            }
        } catch (\Exception $e) {

        }
    }

    protected function getPermissions()
    {
        return app(Permission::class)->with('roles')->get();
    }
}
