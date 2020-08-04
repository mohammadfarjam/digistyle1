<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::paginate(10);
       return view('admin.brands.index',compact(['brands']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required|unique:brands',
            'desc'=>'required'],[
                'title.required'=>'عنوان برند خالی است.',
            'title.unique'=>'این برند قبلا ثبت شده است',
            'desc.required'=>'قسمت توضیحات را پر نمایید. ',
        ]);

        if($validator->fails()){
            return redirect('/administrator/brands')->withErrors($validator)->withInput();
        }else{
            $brands=new Brand();
            $brands->title=$request->input('title');
            $brands->desc=$request->input('desc');
            $brands->photo_id=$request->input('photo_id');
            $brands->save();

            Session::flash('success_brand','برند با موفقت ثبت شد.');
            return redirect('administrator/brands');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands=Brand::with('photo')->whereId($id)->first();
        return view('admin.brands.edit',compact(['brands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required|unique:brands,title,'.$id,
            'desc'=>'required'],[
            'title.required'=>'عنوان برند خالی است.',
            'title.unique'=>'این برند قبلا ثبت شده است',
            'desc.required'=>'قسمت توضیحات را پر نمایید. ',
        ]);

        if($validator->fails()){
            return redirect('/administrator/brands')->withErrors($validator)->withInput();
        }else{
            $brands=Brand::findorfail($id);
            $brands->title=$request->input('title');
            $brands->desc=$request->input('desc');
            $brands->photo_id=$request->input('photo_id');
            $brands->save();

            Session::flash('success_brand','برند با موفقت ویرایش شد.');
            return redirect('administrator/brands');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::findorfail($id);
        $brand->delete();
        Session::flash('delete_brand','برند با موفقت حذف شد.');
        return redirect('administrator/brands');
    }
}
