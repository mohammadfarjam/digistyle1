<?php

namespace App\Http\Controllers\Frontend;

use App\order;
use App\payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function verify()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        if (!$cart) {
            return redirect('frontend.home.index');
        } else {

            $productId = [];
            foreach ($cart->items as $product) {

                $productId[$product['item']->id] = ['qty' => $product['qty']];
            }


            $order = new order();
            $order->amount = $cart->totalPrice;
            $order->user_id = Auth::user()->id;
            $order->status = 0;
            $order->save();

            $order->products()->sync($productId);

            $payment = new payment($order->amount,$order->id);
            $result = $payment->dopayment();


            if ($result->Status == 100) {
                return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
            } else {
                echo'ERR: '.$result->Status;
            }
        }

    }


    public function index()
    {
        $orders=order::orderBy('created_at','desc')->paginate(3);
        return view('frontend.profile.listOrders',compact(['orders']));
    }

    public function showOrder($id)
    {
        $order=order::with('user','products')->whereId($id)->first();
        //return $order;
        return view('frontend.profile.showOrder',compact(['order']));

    }
}
