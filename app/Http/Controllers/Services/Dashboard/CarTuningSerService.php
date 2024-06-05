<?php

namespace App\Http\Controllers\Services\Dashboard;

use App\Http\Controllers\Interfaces\Dashboard\CarTuningSerSericeInterface;
use App\Models\CarTuning;
use App\Models\CarTuningService;

class carTuningSerService implements CarTuningSerSericeInterface {

    public function carTuningSerIndex($data)
    {
        return CarTuningService::with('car_tuning')->where('admin_id',auth()->guard('admin')->user()->id)->filter($data->query())->paginate(10);
    }

    public function carTuningSerStore($data)
    {
        $images = $data->file('images');
        $imagePaths = [];
        if(isset($images)){
            foreach ($images as $image) {
                $newName = rand() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('car-tuning-service-images', $newName, 'public');
                $imagePaths[] = $path;
            }
        }

        $car_tuning_service=CarTuningService::create([
            'name' => $data->name,
            'description'=> $data->description,
            'price' => $data->price,
            'installation' => $data->installation,
            'brand_id'=> $data->brand_id,
            'car_tuning_id'=> $data->car_tuning_id ,
            'admin_id'=> auth()->guard('admin')->user()->id,
            'images'=> json_encode($imagePaths),
        ]);
        if(isset($data->model_id)){
            $car_tuning_service->models()->attach($data['model_id']);
        }
        return $car_tuning_service;
    }
    public function carTuningSerUpdate($data,$id)
    {
        $car_tuning = CarTuning::findOrFail($id);
        $car_tuning->update([
            'name' => $data->name,
            'description'=> $data->description,
        ]);

    }
    public function carTuningSerDestroy($id)
    {
        $admin_id=auth()->guard('admin')->user()->id;
        $car_tuning_service=CarTuningService::where('admin_id',$admin_id)->find($id);
        if($car_tuning_service){
            $car_tuning_service->delete();
        }else{
            return false;
        }
    }

}
