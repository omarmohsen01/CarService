<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable=['total','price','quantity','spare_part_id ',
    'order_id'];

    protected $table='order_details';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function spare_part()
    {
        return $this->belongsTo(SparePart::class);
    }
}
