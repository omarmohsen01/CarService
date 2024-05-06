<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SpareModel extends Pivot
{
    use HasFactory;
    protected $fillable = ['spare_part_id','model_id'];

    protected $table='spare_model';

}
