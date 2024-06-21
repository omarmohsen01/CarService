<?php

namespace App\Http\Controllers\Services\Dashboard;
use App\Http\Controllers\Interfaces\Dashboard\VendorSparePartServiceInterface;
use App\Models\SpareModel;
use App\Models\SparePart;
use Illuminate\Support\Facades\Storage;

class VendorSparePartService implements VendorSparePartServiceInterface {

    public function sparePartIndex($data)
    {
        return SparePart::where('admin_id',auth()->guard('admin')->user()->id)->filter($data->query())->paginate(10);
    }

    public function sparePartStore($data)
    {
        $images = $data->file('images');
        $imagePaths = [];
        $videoPaths = [];
        if(isset($images)){
            foreach ($images as $image) {
                $newName = rand() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('vendor-spare-part-images', $newName, 'public');
                $imagePaths[] = $path;
            }
        }
        $spare_part=SparePart::create([
            'name' => $data->name,
            'quantity'=> $data->quantity,
            'status' => $data->status,
            'price' => $data->price,
            'production_date'=>$data->production_date,
            'expiration_date'=> $data->expiration_date,
            'description'=> $data->description,
            'brand_id'=> $data->brand_id,
            'admin_id'=> auth()->guard('admin')->user()->id,
            'images'=> json_encode($imagePaths),
            'videos'=> json_encode($videoPaths),
        ]);
        if(isset($data->model_id)){
            $spare_part->models()->attach($data['model_id']);
        }
        return $spare_part;
    }
    public function sparePartUpdate($data,$id)
    {
        // $user = User::findOrFail($id);
        // $oldPhotoPath = $user->image;
        // $path = $oldPhotoPath;
        // if ($data->hasFile('image')) {
        //     // Delete the old photo
        //     if ($oldPhotoPath) {
        //         Storage::disk('public')->delete($oldPhotoPath);
        //     }
        //     // Store the new photo
        //     $newImage = $data->file('image');
        //     $newName = rand() . '.' . $newImage->getClientOriginalExtension();
        //     $path = $newImage->storeAs('user-images', $newName, 'public');
        // }
        // $user->update([
        //     'first_name' => $data->first_name,
        //     'last_name'=> $data->last_name,
        //     'email' => $data->email,
        //     'image'=>$path,
        //     'phone'=> $data->phone,
        // ]);

    }
    public function sparePartDestroy($id)
    {
        $admin_id=auth()->guard('admin')->user()->id;
        $spare_part=SparePart::where('admin_id',$admin_id)->find($id);
        if($spare_part){
            $spare_part->delete();
        }else{
            return false;
        }

    }
    public function changeSparePartStatus($id)
    {
        // $user=User::findOrFail($id);
        // if($user->status=='ACTIVE'){
        //     $user->status= 'INACTIVE';
        //     $user->save();
        //     return 'INACTIVATED';
        // }elseif($user->status== 'INACTIVE'){
        //     $user->status='ACTIVE';
        //     $user->save();
        //     return 'ACTIVEATED';
        // }
    }
}
