<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCar extends Model
{
    use HasFactory;
    protected $fillable = ['code','manufacturing_year','brand_id','image'] ;
    protected $table='models';

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function spare_parts()
    {
        return $this->belongsToMany(SparePart::class,'spare_model','model_id','spare_part_id');
    }
    public function scopeFilter(Builder $builder, $filter)
    {
        $defaultOptions = [
            'code' => null,
            'brand_id'=> null,
            'manufacturing_year' => null,
        ];
        $options = array_merge($defaultOptions, $filter);

        $builder->when($options['code'], function ($query, $code) {
            return $query->where('code', $code);
        });
        $builder->when($options['brand_id'], function ($query, $brand_id) {
            return $query->where('brand_id', $brand_id);
        });
        $builder->when($options['manufacturing_year'], function ($query, $manufacturing_year) {
            return $query->where('manufacturing_year', $manufacturing_year);
        });
    }
}
