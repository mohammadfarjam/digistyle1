<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.passwords.email');
    }
}
