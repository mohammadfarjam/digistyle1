<?php

namespace App\Http\Controllers\Frontend;

use App\address;
use App\City;
use App\Jobs\Sample;
use App\Mail\Mail_send;
use App\role_user;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
   use RegistersUsers;
   // use VerifiesEmails;
    public function register(Request $request)
    {
        //return $request->all();

        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'last_name' => 'required',
//            'email' => 'required|email|unique:users',
//            'phone' => 'required|max:11|min:11',
//            'password' => 'required|min:8',
//            'national_code' => 'required|numeric',
//            'address' => 'required',
//            'province' => 'required',
//            'city' => 'required',
//            'zip_code' => 'required|numeric',
//            'g-recaptcha-response' => 'required',
        ], [
//            'name.required' => 'نام خود را وارد کنید.',
//            'last_name.required' => 'نام خانوادگی خود را وارد کنید.',
//            'email.required' => 'ایمیل خود را وارد کنید.',
//            'email.email' => 'ایمیل خود را صحیح وارد کنید.',
//            'email.unique' => 'ایمیل شما تکراری است.',
//            'phone.required' => 'شماره تلفن خود را وارد کنید.',
//            'phone.min' => 'شماره تلفن خود را به درستی وارد کنید.',
//            'phone.max' => 'شماره تلفن خود را به درستی وارد کنید.',
//            'password.required' => ' رمز عبور خود را وارد کنید.',
//            'password.min' => 'رمز عبور شما باید یبش از 8 کاراکتر باشد.',
//            'national_code.required' => 'کد ملی خود را وارد نماید.',
//            'national_code.numeric' => 'کد ملی باید شامل اعداد باشد.',
//            'address.required' => 'آدرس خود را وارد نماید.',
//            'province.required' => 'استان خود را وارد نماید.',
//            'city.required' => 'شهر خود را وارد نماید.',
//            'zip_code.required' => 'کد پستی خود را وارد نماید.',
//            'zip_code.numeric' => 'کد پستی باید شامل اعداد باشد.',
//            'g-recaptcha-response.required' => 'فیلد کد امنیتی را انتخاب کنید.',
        ]);

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        } else {


            $register = new User();
            $register->name = $request['name'];
            $register->last_name = $request['last_name'];
            $register->email = $request['email'];
            $register->phone = $request['phone'];
            $register->password = Hash::make($request['password']);
            $register->national_code = $request['national_code'];
            $register->role_id = 1;
            $register->photo_id = 0;
            $register->save();


            $register->roles()->attach(1);


            $address = new address();
            $address->address = $request['address'];
            $address->province_id = $request['province'];
            $address->city_id = $request['city'];
            $address->zip_code = $request['zip_code'];
            $address->company = $request['company'];
            $address->user_id = $register->id;
            $address->save();

            Mail::to($request->email)->send(new Mail_send());

//            dispatch(new Sample($request['email']));
          //  Sample::dispatch()->delay(5);

            Session::flash('register_success', 'ثبت نام شما با موفقیت انجام شد و ایمیل تایید برای شما ارسال شد.');
            return redirect('login');
        }
    }


    public function profile()

    {
        $user = Auth::User();
        return view('frontend.profile.index', compact(['user']));
    }


    public function getCity(Request $request)
    {
        $id = $request['id'];
        $city = City::where('province_id', $id)->get();
        return response()->json($city, 200);
    }


    public function emailAvailable(Request $request)
    {
        $check_email = $request['email'];
        $email = User::where('email', $check_email)->count();
        if ($email > 0) {
            echo 'not_unique';
        } else {
            echo 'unique';
        }
    }
}
