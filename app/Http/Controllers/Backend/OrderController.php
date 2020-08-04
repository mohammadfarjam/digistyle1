<?php

namespace App\Http\Controllers\Backend;

use App\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders=order::orderBy('created_at','desc')->paginate(3);
        return view('admin.orders.index',compact(['orders']));
    }

    public function ordershow($id)
    {
        $order=order::with('products','user.address.province','user.address.city')->whereId($id)->first();

        return view('admin.orders.orderShow',compact(['order']));
    }
}
