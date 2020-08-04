<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function products()
    {
        return $this->belongsToMany(product::class)->withPivot('qty');
  }

    public function user()
    {
        return $this->belongsTo(User::class);
  }

    public function payment()
    {
        return $this->hasOne(payment::class);
  }

    public function address()
    {
        return $this->hasMany(order::class);
    }
}
