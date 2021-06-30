<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            return redirect('admincp');
        } else {
            return view('login');
        }
    }

    public function postLogin()
    {

    }
}
