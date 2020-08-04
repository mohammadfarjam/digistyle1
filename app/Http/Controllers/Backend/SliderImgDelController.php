<?php

namespace App\Http\Controllers\Backend;

use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderImgDelController extends Controller
{
    public function img_del(Request $request)
    {
        $id=$request['id'];
        $photo=Photo::findorfail($id);
        $photo->delete();
        return response()->json('ok', 200);
    }
}
