<?php
namespace App\Http\Controllers\Interfaces\Dashboard;

interface BrandSericeInterface
{
    public function brandIndex($data);
    public function brandStore($data);
    public function brandUpdate($data,$id);
    public function brandDestroy($id);
}
