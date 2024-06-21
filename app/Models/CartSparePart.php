<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartSparePart extends Model
{
    use HasFactory;
    protected $fillable=['spare_part_id','cart_id','quantity'];
    protected $table='cart_spare_part';

    public function cart()
    {
        return $this->belongsTo(Cart::class,'cart_id');
    }
    public function spare_part()
    {
        return $this->belongsTo(SparePart::class,'spare_part_id');
    }
}
