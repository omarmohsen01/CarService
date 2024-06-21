<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;

class ManageBrnadPolicy
{
    public function accessBrandController(Admin $admin)
    {
        return $admin->type==='Admin'|| $admin->type === 'SUPER_ADMIN';
    }
    public function createBrand(Admin $admin)
    {
               return $admin->type==='Admin'|| $admin->type === 'SUPER_ADMIN';

    }

    /**
     * Determine whether the Admin can edit the specified Admin.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Admin  $AdminToEdit
     * @return mixed
     */
    public function editBrand(Admin $admin)
    {
               return $admin->type==='Admin'|| $admin->type === 'SUPER_ADMIN';

    }

    /**
     * Determine whether the Admin can delete the specified Admin.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Admin  $AdminToDelete
     * @return mixed
     */
    public function deleteBrand(Admin $admin, Admin $AdminToDelete)
    {
               return $admin->type==='Admin'|| $admin->type === 'SUPER_ADMIN';

    }

}
