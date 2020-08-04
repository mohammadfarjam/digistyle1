<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function products()
    {
        return $this->hasMany(product::class);
    }

    public function Coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }

    public function orders()
    {
        return $this->hasMany(order::class);
    }

    public function address()
    {
        return $this->hasMany(address::class);
    }

    public function roles()
    {
       return $this->belongsToMany(Role::class);
    }



}
