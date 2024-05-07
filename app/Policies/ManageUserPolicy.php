<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;

class ManageUserPolicy
{
    public function accessUserController(Admin $admin)
    {
        return $admin->type === 'ADMIN'||$admin->type === 'SUPER_ADMIN';
    }
    public function createUser(Admin $admin)
    {
        return $admin->type === 'ADMIN'||$admin->type === 'SUPER_ADMIN';
    }

    /**
     * Determine whether the user can edit the specified user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $userToEdit
     * @return mixed
     */
    public function editUser(Admin $admin)
    {
        return $admin->type === 'ADMIN'||$admin->type === 'SUPER_ADMIN';
    }

    /**
     * Determine whether the user can delete the specified user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $userToDelete
     * @return mixed
     */
    public function deleteUser(Admin $admin, User $userToDelete)
    {
        return $admin->type === 'ADMIN'||$admin->type === 'SUPER_ADMIN';
    }

    public function activeUser(Admin $admin)
    {
        return $admin->type === 'ADMIN'||$admin->type === 'SUPER_ADMIN';
    }
}
