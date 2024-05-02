<?php

namespace App\Http\Controllers\Services\Dashboard;
use App\Http\Controllers\Interfaces\Dashboard\AdminSericeInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminService implements AdminSericeInterface {

    public function adminIndex($data)
    {
        return Admin::filter($data->query())->paginate(10);
    }

    public function adminStore($data)
    {
        $path=null;
        if ($data->hasFile('image')) {
            $newImage = $data->file('image');
            $newName = rand() . '.' . $newImage->getClientOriginalExtension();
            $path = $newImage->storeAs('admin-images', $newName, 'public');
        }
        $admin=Admin::create([
            'first_name' => $data->first_name,
            'last_name'=> $data->last_name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'image'=>$path,
            'phone'=> $data->phone,
            'type'=> $data->type
        ]);
        return $admin;
    }
    public function adminUpdate($data,$id)
    {
        $admin = Admin::findOrFail($id);
        $oldPhotoPath = $admin->image;
        $path = $oldPhotoPath;
        if ($data->hasFile('image')) {
            // Delete the old photo
            if ($oldPhotoPath) {
                Storage::disk('public')->delete($oldPhotoPath);
            }
            // Store the new photo
            $newImage = $data->file('image');
            $newName = rand() . '.' . $newImage->getClientOriginalExtension();
            $path = $newImage->storeAs('admin-images', $newName, 'public');
        }
        $admin->update([
            'first_name' => $data->first_name,
            'last_name'=> $data->last_name,
            'email' => $data->email,
            'image'=>$path,
            'phone'=> $data->phone,
            'type'=> $data->type
        ]);

    }
    public function adminDestroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
    }
    public function changeAdminStatus($id)
    {
        $admin=Admin::findOrFail($id);
        if($admin->status=='ACTIVE'){
            $admin->status= 'INACTIVE';
            $admin->save();
            return 'INACTIVATED';
        }elseif($admin->status== 'INACTIVE'){
            $admin->status='ACTIVE';
            $admin->save();
            return 'ACTIVEATED';
        }
    }
}
