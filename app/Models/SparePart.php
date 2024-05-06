<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','price','images','videos','status','quantity','production_date','expiration_date','admin_id','brand_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function models()
    {
        return $this->belongsToMany(ModelCar::class,'spare_model','spare_part_id','model_id');
    }

    public function scopeFilter(Builder $builder, $filter)
    {
        $defaultOptions = [
            'name' => null,
            'brand_id' => null,
            'status' => null,
        ];

        $options = array_merge($defaultOptions, $filter);

        $builder->when($options['name'], function ($query, $name) {
            return $query->where('name', $name);
        });
        $builder->when($options['brand_id'], function ($query, $brand_id) {
            return $query->where('brand_id', $brand_id);
        });
        $builder->when($options['status'], function ($query, $status) {
            return $query->where('status', $status);
        });

        return $builder;
    }
}
