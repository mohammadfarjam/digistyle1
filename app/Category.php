<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function products()
    {
        return $this->belongsToMany(product::class);
    }

    public function attributegroups()
    {
        return $this->belongsToMany(Attribute::class,'attributegroup_category','category_id','attribute_group_id');
    }
}
