<?php

namespace App\Http\Controllers\Services\Dashboard;

use App\Http\Controllers\Interfaces\Dashboard\ModelSericeInterface;
use App\Models\Brand;
use App\Models\ModelCar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ModelService implements ModelSericeInterface {

    public function modelIndex($data)
    {
        return ModelCar::filter($data->query())->paginate(10);
    }

    public function modelStore($data)
    {
        $path=null;
        if ($data->hasFile('image')) {
            $newImage = $data->file('image');
            $newName = rand() . '.' . $newImage->getClientOriginalExtension();
            $path = $newImage->storeAs('model-images', $newName, 'public');
        }
        $model=ModelCar::create([
            'code' => $data->code,
            'manufacturing_year'=> $data->manufacturing_year,
            'brand_id'=> $data->brand_id,
            'image'=>$path,
        ]);
        return $model;
    }
    public function modelUpdate($data,$id)
    {
        $model = ModelCar::findOrFail($id);
        $oldPhotoPath = $model->image;
        $path = $oldPhotoPath;
        if ($data->hasFile('image')) {
            // Delete the old photo
            if ($oldPhotoPath) {
                Storage::disk('public')->delete($oldPhotoPath);
            }
            // Store the new photo
            $newImage = $data->file('image');
            $newName = rand() . '.' . $newImage->getClientOriginalExtension();
            $path = $newImage->storeAs('model-images', $newName, 'public');
        }
        $model->update([
            'code' => $data->code,
            'manufacturing_year'=> $data->manufacturing_year,
            'brand_id'=> $data->brand_id,
            'image'=>$path,
        ]);

    }
    public function modelDestroy($id)
    {
        $model = ModelCar::findOrFail($id);
        $model->delete();
    }

}
