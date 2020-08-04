<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowCategoryController extends Controller
{
    public function showcategory($id)
    {
        $category=Category::findorfail($id);
          $products=product::with('photos')->whereHas('categories',function ($q) use($category){
             $q->where('id',$category->id);
          })->paginate(2);

        return view('frontend.show_category.index',compact(['products','category']));
   }
}
