<?php

namespace App\Http\Controllers\Frontend;

use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function SerachTitle(Request $request)
    {
        $value_search=$request['value'];
        $product=product::with('brand','Photos','attributevalues.attributeGroup','categories')->where('title','like',"%".$value_search."%")->orWhere('slug','like',"%".$value_search."%")->where('status',1)->orderBy('created_at','desc')->take(3)->get();
        return response()->json($product,200);
    }

    public function index($id)
    {
        $products=product::with('photos','brand','attributevalues.attributeGroup','categories')->whereId($id)->paginate(10);
       // return $products;
        return view('frontend.search.index',compact(['products']));
    }

    public function doSearch(Request $request)
    {

            $value_search = $request['search'];
            $products = product::with('Photos', 'brand', 'attributevalues.attributeGroup', 'categories')->where('title', 'like', "%" . $value_search . "%")->orWhere('slug', 'like', "%" . $value_search . "%")->where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
            //return $products;
            return view('frontend.search.index', compact(['products', 'value_search']));
    }
}
