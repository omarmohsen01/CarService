<?php
namespace App\Http\Controllers\Interfaces\Dashboard;

interface CarTuningSerSericeInterface
{
    public function carTuningSerIndex($data);
    public function carTuningSerStore($data);
    public function carTuningSerUpdate($data,$id);
    public function carTuningSerDestroy($id);
}
