<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;

class ManageAdminPolicy
{
    public function accessAdminController(Admin $admin)
    {
        return $admin->type === 'SUPER_ADMIN';
    }
    public function createAdmin(Admin $admin)
    {
        return $admin->type === 'SUPER_ADMIN';
    }

    /**
     * Determine whether the Admin can edit the specified Admin.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Admin  $AdminToEdit
     * @return mixed
     */
    public function editAdmin(Admin $admin)
    {
        return $admin->type === 'SUPER_ADMIN';
    }

    /**
     * Determine whether the Admin can delete the specified Admin.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Admin  $AdminToDelete
     * @return mixed
     */
    public function deleteAdmin(Admin $admin, Admin $AdminToDelete)
    {
        return $admin->type === 'SUPER_ADMIN';
    }

    public function activeAdmin(Admin $admin)
    {
        return $admin->type === 'SUPER_ADMIN';
    }
}
