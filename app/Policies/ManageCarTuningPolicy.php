<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;

class ManageCarTuningPolicy
{

    public function accessCarTuningController(Admin $admin)
    {
        return $admin->type==='Admin'|| $admin->type === 'SUPER_ADMIN';
    }
    public function createCarTuning(Admin $admin)
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
    public function editCarTuning(Admin $admin)
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
    public function deleteCarTuning(Admin $admin)
    {
        return $admin->type==='Admin'|| $admin->type === 'SUPER_ADMIN';

    }

}
