<?php

namespace Thienkimlove\Vauth\Contracts;

interface Role
{
    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions();
    
    public static function addPermission($permission);
}
