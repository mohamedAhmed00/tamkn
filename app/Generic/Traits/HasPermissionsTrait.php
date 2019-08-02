<?php

namespace App\Modules\Traits;

trait HasPermissionsTrait
{
    /**
     * @param mixed ...$roles
     * @return bool
     * @author Nader Ahmed
     */
    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
    /**
     * @param string
     * @return bool
     * @author Nader Ahmed
     */
    protected function hasPermissionTo($permission) {
        return $this->hasPermission($permission);
    }
    /**
     * @param mixed string
     * @return bool
     * @author Nader Ahmed
     */
    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }
}
