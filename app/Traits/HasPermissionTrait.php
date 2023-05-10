<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasPermissionTrait
{
    //given permission
    public function getAllPermissions($permission)
    {
        return Permission::whereIn('slug', $permission)->get();
    }

    //check user permission
    public function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }
    // check has role
    public function hasRole(...$roles)
    {
        //dd($roles);
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
            return false;
        }
    }
    //
    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permissions)
    {
        foreach ($permissions->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
            return false;
        }
    }

    //given permission
    public function givenPermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions == null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function permissions()
    {
        return $this->belongsTomany(Permission::class, 'users_permissions');
    }
    public function roles()
    {
        return $this->belongsTomany(Role::class, 'users_roles');
    }
}
