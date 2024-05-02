<?php

namespace App\Http\Controllers\Services\Dashboard;
use App\Http\Controllers\Interfaces\Dashboard\UserSericeInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService implements UserSericeInterface {

    public function userIndex($data)
    {
        return User::filter($data->query())->paginate(10);
    }

    public function userStore($data)
    {
        $path=null;
        if ($data->hasFile('image')) {
            $newImage = $data->file('image');
            $newName = rand() . '.' . $newImage->getClientOriginalExtension();
            $path = $newImage->storeAs('user-images', $newName, 'public');
        }
        $user=User::create([
            'first_name' => $data->first_name,
            'last_name'=> $data->last_name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'image'=>$path,
            'phone'=> $data->phone,
        ]);
        return $user;
    }
    public function userUpdate($data,$id)
    {
        $user = User::findOrFail($id);
        $oldPhotoPath = $user->image;
        $path = $oldPhotoPath;
        if ($data->hasFile('image')) {
            // Delete the old photo
            if ($oldPhotoPath) {
                Storage::disk('public')->delete($oldPhotoPath);
            }
            // Store the new photo
            $newImage = $data->file('image');
            $newName = rand() . '.' . $newImage->getClientOriginalExtension();
            $path = $newImage->storeAs('user-images', $newName, 'public');
        }
        $user->update([
            'first_name' => $data->first_name,
            'last_name'=> $data->last_name,
            'email' => $data->email,
            'image'=>$path,
            'phone'=> $data->phone,
        ]);

    }
    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
    public function changeUserStatus($id)
    {
        $user=User::findOrFail($id);
        if($user->status=='ACTIVE'){
            $user->status= 'INACTIVE';
            $user->save();
            return 'INACTIVATED';
        }elseif($user->status== 'INACTIVE'){
            $user->status='ACTIVE';
            $user->save();
            return 'ACTIVEATED';
        }
    }
}
