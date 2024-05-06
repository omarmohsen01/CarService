<?php
namespace App\Http\Controllers\Interfaces\Dashboard;

interface VendorSparePartServiceInterface
{
    public function sparePartIndex($data);
    public function sparePartStore($data);
    public function sparePartUpdate($data,$id);
    public function sparePartDestroy($id);
    public function changeSparePartStatus($id);
}
