<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table='address';

    public function user()
    {
           return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }



    public function order()
    {
        return $this->belongsTo(order::class);
    }
}
