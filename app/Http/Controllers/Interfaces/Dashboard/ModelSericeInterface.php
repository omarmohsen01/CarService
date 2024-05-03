<?php
namespace App\Http\Controllers\Interfaces\Dashboard;

interface ModelSericeInterface
{
    public function modelIndex($data);
    public function modelStore($data);
    public function modelUpdate($data,$id);
    public function modelDestroy($id);
}
