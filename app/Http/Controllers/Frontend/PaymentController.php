<?php

namespace App\Http\Controllers\Frontend;

use App\order;
use App\payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function verify(Request $request, $id)
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $payment = new payment($cart->totalPrice);
        $result = $payment->verifypayment($request->Authority, $request->Status);

        if ($result) {

            $order = order::findorfail($id);
            $order->Status = 1;
            $order->save();

            $newpayment = new payment($cart->totalPrice);
            $newpayment->authority = $request->Authority;
            $newpayment->status = $request->Status;
            $newpayment->RefID = $result->RefID;
            $newpayment->order_id = $id;
            $newpayment->save();

            Session::forget('cart');

            Session::flash('succses_payment', ' پرداخت شما موفقیت آمیز بود.');
            return redirect('/profile');
        } else {
            Session::flash('error_payment', ' در پرداخت شما خطای به وجود آمده است لطفا دوباره تلاش کنید.');
            return redirect('/CartCheck');
        }
    }
}
