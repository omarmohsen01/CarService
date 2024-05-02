<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends User
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'first_name','last_name',
        'email','phone',
        'password','type',
        'image','status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter(Builder $builder, $filter)
    {
        $defaultOptions = [
            'first_name' => null,
            'last_name' => null,
            'email' => null,
            'phone' => null,
            'type'=> null,
            'status' => null,
        ];

        $options = array_merge($defaultOptions, $filter);

        $builder->when($options['first_name'], function ($query, $first_name) {
            return $query->where('first_name', $first_name);
        });
        $builder->when($options['last_name'], function ($query, $last_name) {
            return $query->where('last_name', $last_name);
        });
        $builder->when($options['email'], function ($query, $email) {
            return $query->where('email', $email);
        });
        $builder->when($options['phone'], function ($query, $phone) {
            return $query->where('phone', $phone);
        });
        $builder->when($options['type'], function ($query, $type) {
            return $query->where('type', $type);
        });
        $builder->when($options['status'], function ($query, $status) {
            return $query->where('status', $status);
        });

        return $builder;
    }

}
