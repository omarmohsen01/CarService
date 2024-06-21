<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spare_parts()
    {
        return $this->belongsToMany(SparePart::class,'cart_spare_part','cart_id','spare_part_id')->withPivot(['qunatity']);
    }
}
