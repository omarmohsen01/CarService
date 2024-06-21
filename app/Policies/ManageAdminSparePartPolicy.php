<?php

namespace App\Policies;

use App\Models\SparePart;
use App\Models\aAdminSparePart;
use App\Models\Admin;

class ManageAdminSparePartPolicy
{
    public function accessAdminSparePartController(Admin $admin)
    {
        return $admin->type === 'ADMIN'||$admin->type === 'SUPER_ADMIN';
    }
    public function deleteAdminSparePart(Admin $admin)
    {
        return $admin->type === 'ADMIN'||$admin->type === 'SUPER_ADMIN';
    }

}
