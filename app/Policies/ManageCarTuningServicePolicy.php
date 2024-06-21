<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;

class ManageCarTuningServicePolicy
{

    public function accessCarTuningServiceController(Admin $admin)
    {
        return $admin->type==='Vendor';
    }
    public function createCarTuningService(Admin $admin)
    {
               return $admin->type==='Vendor';

    }

    /**
     * Determine whether the Admin can edit the specified Admin.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Admin  $AdminToEdit
     * @return mixed
     */
    public function editCarTuningService(Admin $admin)
    {
               return $admin->type==='Vendor';

    }

    /**
     * Determine whether the Admin can delete the specified Admin.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Admin  $AdminToDelete
     * @return mixed
     */
    public function deleteCarTuningService(Admin $admin)
    {
        return $admin->type==='Vendor';

    }
}
