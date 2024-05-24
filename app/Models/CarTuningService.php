<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTuningService extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','image','installation','car_tuning_id','brand_id'];
    protected $table='car_tuning_services';

    public function car_tuning()
    {
        return $this->belongsTo(CarTuning::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function models()
    {
        return $this->belongsToMany(ModelCar::class,'tuning_model','tuning_service_id','model_id');
    }
}
