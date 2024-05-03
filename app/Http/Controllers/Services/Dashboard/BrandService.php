<?php

namespace App\Http\Controllers\Services\Dashboard;

use App\Http\Controllers\Interfaces\Dashboard\BrandSericeInterface;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BrandService implements BrandSericeInterface {

    public function brandIndex($data)
    {
        return Brand::filter($data->query())->paginate(10);
    }

    public function brandStore($data)
    {
        $path=null;
        if ($data->hasFile('image')) {
            $newImage = $data->file('image');
            $newName = rand() . '.' . $newImage->getClientOriginalExtension();
            $path = $newImage->storeAs('brand-images', $newName, 'public');
        }
        $brand=Brand::create([
            'name' => $data->name,
            'country_of_manufacture'=> $data->country_of_manufacture,
            'image'=>$path,
        ]);
        return $brand;
    }
    public function brandUpdate($data,$id)
    {
        $brand = Brand::findOrFail($id);
        $oldPhotoPath = $brand->image;
        $path = $oldPhotoPath;
        if ($data->hasFile('image')) {
            // Delete the old photo
            if ($oldPhotoPath) {
                Storage::disk('public')->delete($oldPhotoPath);
            }
            // Store the new photo
            $newImage = $data->file('image');
            $newName = rand() . '.' . $newImage->getClientOriginalExtension();
            $path = $newImage->storeAs('brand-images', $newName, 'public');
        }
        $brand->update([
            'name' => $data->name,
            'country_of_manufacture'=> $data->country_of_manufacture,
            'image'=>$path,
        ]);

    }
    public function brandDestroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
    }

}
