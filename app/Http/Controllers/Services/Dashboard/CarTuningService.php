<?php

namespace App\Http\Controllers\Services\Dashboard;

use App\Http\Controllers\Interfaces\Dashboard\BrandSericeInterface;
use App\Http\Controllers\Interfaces\Dashboard\CarTuningServiceInterface;
use App\Models\Brand;
use App\Models\CarTuning;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class carTuningService implements CarTuningServiceInterface {

    public function carTuningIndex()
    {
        return CarTuning::paginate(10);
    }

    public function carTuningStore($data)
    {
        $car_tuning=CarTuning::create([
            'name' => $data->name,
            'description'=> $data->description,
        ]);
        return $car_tuning;
    }
    public function carTuningUpdate($data,$id)
    {
        $car_tuning = CarTuning::findOrFail($id);
        $car_tuning->update([
            'name' => $data->name,
            'description'=> $data->description,
        ]);

    }
    public function carTuningDestroy($id)
    {
        $car_tuning = CarTuning::findOrFail($id);
        $car_tuning->delete();
    }

}
