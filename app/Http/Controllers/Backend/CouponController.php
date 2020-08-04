<?php

namespace App\Http\Controllers\Backend;

use App\Backend\Coupon;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons.index', compact(['coupons']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = new Coupon();
        $coupon->title = $request['title'];
        $coupon->code = $request['code'];
        $coupon->value = $request['value'];
        $coupon->status = $request['status'];
        $coupon->user_id = 48;

        $coupon->save();
        return redirect('administrator/coupons');
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
        $coupon = Coupon::findorfail($id);
        return view('admin.coupons.edit', compact(['coupon']));
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
        $coupon = Coupon::findorfail($id);
        $coupon->title = $request['title'];
        $coupon->code = $request['code'];
        $coupon->value = $request['value'];
        $coupon->status = $request['status'];
        $coupon->user_id = 48;

        $coupon->save();
        return redirect('administrator/coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findorfail($id);
        $coupon->delete();
        return redirect('administrator/coupons');
    }

    public function Check(Request $request)
    {

        $value = $request['value'];
        $coupon = Coupon::where('code', $value)->where('status', 1)->first();
        if ($coupon) {
            return response()->json($coupon, 200);
            //Session::forget('bad_code');
        } else {

         return redirect('cart');
        }

    }

}





