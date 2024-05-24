<?php
namespace App\Http\Controllers\Interfaces\Dashboard;

interface CarTuningSericeInterface
{
    public function carTuningIndex();
    public function carTuningStore($data);
    public function carTuningUpdate($data,$id);
    public function carTuningDestroy($id);
}
