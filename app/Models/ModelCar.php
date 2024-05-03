<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCar extends Model
{
    use HasFactory;
    protected $fillable = ['name','manufacturing_year','brand_id','image'] ;
    protected $table='models';

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
