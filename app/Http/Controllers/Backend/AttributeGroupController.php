<?php

namespace App\Http\Controllers\Backend;

use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribute_group = Attribute::paginate(10);
        return view('admin.attribute.index', compact(['attribute_group']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = new Attribute();
        $attribute->title = $request->input('title');
        $attribute->type = $request->input('attr_type');
        $attribute->save();

        Session::flash('add_attr', 'ویژگی جدید ایجاد شد.');
        return redirect('administrator/attribute_group');
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
        $attribute_group=Attribute::findorfail($id);
        return view('admin.attribute.edit',compact(['attribute_group']));
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
        $attribute_group=Attribute::findorfail($id);
        $attribute_group->title = $request->input('title');
        $attribute_group->type = $request->input('attr_type');
        $attribute_group->save();

        Session::flash('update_attr','با موفقیت ویرایش شد '.$attribute_group->title.' ویژگی');
        return redirect('administrator/attribute_group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute_group=Attribute::findorfail($id);
        $attribute_group->delete();
        Session::flash('delete_attr','با موفقیت حذف شد '.$attribute_group->title.' ویژگی');
        return redirect('administrator/attribute_group');

    }
}
