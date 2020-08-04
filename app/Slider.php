<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table='sliders';

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
