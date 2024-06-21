<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['content','brand_id','user_id'] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function scopeFilter(Builder $builder, $filter)
    {
        $defaultOptions = [
            'brand_id'=> null,
            'user_id' => null,
        ];
        $options = array_merge($defaultOptions, $filter);

        $builder->when($options['brand_id'], function ($query, $brand_id) {
            return $query->where('brand_id', $brand_id);
        });
        $builder->when($options['user_id'], function ($query, $user_id) {
            return $query->where('user_id', $user_id);
        });
    }
}
