<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table='attribute_group';

    public function attributeValue()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'attributegroup_category','attribute_group_id','category_id');
    }
}
