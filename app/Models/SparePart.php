<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','price','status','quantity','production_date','expiration_date','admin_id','brand_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
