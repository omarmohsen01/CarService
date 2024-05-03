<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_of_manufacture','image'];

    public function scopeFilter(Builder $builder, $filter)
    {
        $defaultOptions = [
            'name' => null,
            'country_of_manufacture' => null,
        ];
        $options = array_merge($defaultOptions, $filter);

        $builder->when($options['name'], function ($query, $name) {
            return $query->where('name', $name);
        });
        $builder->when($options['country_of_manufacture'], function ($query, $country_of_manufacture) {
            return $query->where('country_of_manufacture', $country_of_manufacture);
        });
    }
}
