<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    public function city()
    {
        return $this->hasMany(City::class);
    }


    public function address()
    {
        return $this->hasMany(address::class);
    }
}
