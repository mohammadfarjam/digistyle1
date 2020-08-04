<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='product';

    //protected $casts=['category_id'=>'array'];

    public function Categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attributevalues()
    {
        return $this->belongsToMany(AttributeValue::class,'attributevalue_product','product_id','attributevalue_id');

    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function order()
    {
        return $this->belongsToMany(order::class);
    }
}
