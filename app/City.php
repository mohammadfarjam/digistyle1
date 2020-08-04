<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function province()
    {
        return $this->belongsTo(province::class);
   }

    public function address()
    {
        return $this->hasMany(address::class);
    }
}
