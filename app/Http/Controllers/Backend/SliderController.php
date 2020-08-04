<?php

namespace App\Http\Controllers\Backend;

use App\Photo;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sliders=Slider::with('photo')->get();
        return view('admin.slider.index',compact(['sliders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'photo_id' => 'required',

        ],[
            'title.required'=> 'عنوان خود را وارد کنید.',
            'title.min'=>'عنوان نباید کمتر از 5 کاراکتر باشد.',
            'photo_id.required'=>'تصویر خود را انتخاب نمایید',
            'photo_id.mimes'=>'فرمت های قابل پشتیبانی تصویر png,jpeg,jpg ',
            'photo_id.max'=>'حداکثر حجم 1000 کیلوبایت است.',
        ]);

        if ($validator->fails()) {

            return redirect('/administrator/slider/create')->withErrors($validator)->withInput();
        } else {

            $newSlider = new Slider();
            $newSlider->title = $request['title'];
            $newSlider->status = $request['status'];
            $newSlider->data = $request['data'];
            $newSlider->photo_id = $request['photo_id'];
            $newSlider->save();

            Alert::success('اسلاید جدید با موفقیت ثبت شد.');

            return redirect('/administrator/slider');

        }
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
        $slider=Slider::with('photo')->whereId($id)->first();
       //return $slider;
        return view('admin.slider.edit',compact(['slider']));
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
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'photo_id' => 'required',
        ],[
            'title.required'=> 'عنوان خود را وارد کنید.',
            'title.min'=>'عنوان نباید کمتر از 5 کاراکتر باشد.',
            'photo_id.required'=>'تصویر خود را انتخاب نمایید',
            'photo_id.mimes'=>'فرمت های قابل پشتیبانی تصویر png,jpeg,jpg ',
            'photo_id.max'=>'حداکثر حجم 1000 کیلوبایت است.',
        ]);

        if ($validator->fails()) {

            return redirect('/administrator/slider/edit')->withErrors($validator)->withInput();
        } else {

            $updateSlider=Slider::findorfail($id);
            $updateSlider->title = $request['title'];
            $updateSlider->status = $request['status'];
            $updateSlider->data = $request['data'];
            $updateSlider->photo_id = $request['photo_id'];
            $updateSlider->save();

            Alert::success('اسلاید با موفقیت ویرایش شد.');

            return redirect('/administrator/slider');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slider=Slider::findorfail($id);
        $Slider->delete();

        Alert::success('اسلاید با موفقیت حذف شد.');
        return redirect('administrator/slider');
    }




}
