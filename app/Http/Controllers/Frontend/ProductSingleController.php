<?php

namespace App\Http\Controllers\Frontend;

use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductSingleController extends Controller
{
    public function getProduct($id)
    {
        $product=product::with(['Photos','brand','attributevalues.attributeGroup','categories'])->whereId($id)->first();
        //return $product;


//        //این قسمت برای محصولات مرتبط می باشد
//        $relatedProduct=product::with('categories')->whereHas('categories',function($q) use($product){
//$q->whereIn('id',$product->categories);
//    })->get();
//        //return $relatedProduct;
        return view('frontend.products.index',compact(['product']));
    }
}
