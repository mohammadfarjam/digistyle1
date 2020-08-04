<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table='Attribute_value';
    public function attributegroup()
    {
        return $this->belongsTo(Attribute::class,'attribute_group_id');
   }

    public function products()
    {
        return $this->belongsToMany(product::class,'attributevalue_product','attributevalue_id','product_id');

    }
}
