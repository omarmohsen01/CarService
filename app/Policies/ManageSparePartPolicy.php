<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;

class ManageSparePartPolicy
{
    public function accessSparePartController(Admin $admin)
    {
        return $admin->type==='Vendor';
    }
    public function createSparePart(Admin $admin)
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
    public function editSparePart(Admin $admin)
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
    public function deleteSparePart(Admin $admin)
    {
        return $admin->type==='Vendor';

    }
}
