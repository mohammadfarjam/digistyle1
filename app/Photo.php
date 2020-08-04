<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $upload='/storage/photos/';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPathAttribute($photo)
    {
        return $this->upload.$photo;
    }

    public function products()
    {
        return $this->belongsToMany(product::class);
    }

    public function sliders()
    {
        return $this->belongsToMany(Slider::class);
    }
}
