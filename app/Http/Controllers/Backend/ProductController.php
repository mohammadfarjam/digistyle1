<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Category;
use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('admin.products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childrenRecursive')->where('parent_id', null)->get();
        $brands = Brand::all();
        return view('admin.products.create', compact(['brands', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function generateSKU()
    {
        $number = mt_rand(1000, 99999);
        if ($this->checkSKU($number)) {
            return $this->generateSKU();
        }
        return (string)$number;
    }

    public function checkSKU($number)
    {
        return product::where('sku', $number)->exists();
    }


    function makeSlug($string)
    {
        $string = strtolower($string);
        $string = str_replace(['؟', '?'], '', $string);
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public function store(Request $request)
    {
        //return $request->all();
        $newProduct = new product();
        $newProduct->title = $request->title;
        $newProduct->sku = $this->generateSKU();
        $newProduct->slug = $request->slug;
        $newProduct->status = $request->status;
        $newProduct->brand_id = $request->brand;
        $newProduct->price = $request->price;
        $newProduct->discount_price = $request->discount_price;
        $newProduct->description = $request->description;
        $newProduct->brand_id = $request->brand;
        $newProduct->meta_desc = $request->meta_desc;
        $newProduct->meta_title = $request->meta_title;
        $newProduct->meta_keywords = $request->meta_keywords;
        $newProduct->user_id = Auth::user()->id;
        $newProduct->save();

        $newProduct->categories()->sync($request->categories);
        $photo_id = explode(',', $request->input('photo_id')[0]);
        $newProduct->photos()->sync($photo_id);

        Session::flash('success_product', 'محصول با موفقیت ثبت شد.');
        return redirect('/administrator/products');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::with(['brand', 'categories', 'photos'])->whereId($id)->first();
        $brands = Brand::all();
        return view('admin.products.edit', compact(['product', 'brands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = product::findorfail($id);
        $product->title = $request->title;
        $product->sku = $this->generateSKU();
        $product->slug = $request->slug;
        $product->status = $request->status;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;
        $product->brand_id = $request->brand;
        $product->meta_desc = $request->meta_desc;
        $product->meta_title = $request->meta_title;
        $product->meta_keywords = $request->meta_keywords;
        $product->user_id = Auth::user()->id;
        $product->save();

        $product->categories()->sync($request->categories);

        $photo_id = explode(',', $request->input('photo_id')[0]);
        $product->photos()->sync($photo_id);

        Session::flash('update_product', 'محصول ویرایش شد.');
        return redirect('/administrator/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::findorfail($id);
        $product->delete();
        Session::flash('delete_product', 'محصول حذف شد.');
        return redirect('/administrator/products');
    }
}
