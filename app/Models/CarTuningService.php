<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTuningService extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','images','installation','car_tuning_id','brand_id','admin_id'];
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

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function scopeFilter(Builder $builder, $filter)
    {
        $defaultOptions = [
            'name' => null,
            'installation' => null,
            'brand_id' => null,
            'admin_id'=>null,
        ];

        $options = array_merge($defaultOptions, $filter);

        $builder->when($options['name'], function ($query, $name) {
            return $query->where('name', $name);
        });
        $builder->when($options['brand_id'], function ($query, $brand_id) {
            return $query->where('brand_id', $brand_id);
        });
        $builder->when($options['installation'], function ($query, $installation) {
            return $query->where('installation', $installation);
        });
        $builder->when($options['admin_id'], function ($query, $admin_id) {
            return $query->where('admin_id', $admin_id);
        });

        return $builder;
    }
}
