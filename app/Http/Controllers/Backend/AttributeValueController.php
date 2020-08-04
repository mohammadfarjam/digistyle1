<?php

namespace App\Http\Controllers\Backend;

use App\Attribute;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribute_values=AttributeValue::paginate(10);
        return view('admin.attribute_value.index',compact(['attribute_values']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes=Attribute::all();
        return view('admin.attribute_value.create',compact(['attributes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attribute= new AttributeValue();
        $attribute->title=$request->input('title');
        $attribute->attribute_group_id=$request->input('select_attr');
        $attribute->save();
         Session::flash('add_attr_value','مقدار ویژگی ثبت شد');
        return redirect('administrator/attribute_value');
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
        $attribute_value=AttributeValue::with('attributegroup')->whereId($id)->first();
        $attribute_group=Attribute::all();
        return view('admin.attribute_value.edit',compact(['attribute_value','attribute_group']));
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
        $update_value=AttributeValue::findorfail($id);
        $update_value->title=$request->input('title');
        $update_value->attribute_group_id=$request->input('attr_value');
        $update_value->save();

        Session::flash('update_attr_value','مقدار ویژگی ویرایش شد');
        return redirect('administrator/attribute_value');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_value=AttributeValue::findorfail($id);
        $delete_value->delete();

        Session::flash('delete_attr_value','مقدار ویژگی حذف شد');
        return redirect('administrator/attribute_value');
    }
}
