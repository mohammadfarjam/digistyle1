<?php
namespace App\Utility;
use Illuminate\Support\Str;

class Utility {
    const  URL = 'digistyle.me/';

    public static function tokengenerator()
    {
        $rand =  Str::random(50);
        //DB::table('email')->insert(['token'=>$rand]);
        return $rand;
    }
}
