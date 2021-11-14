<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index() {
        $params = [
            'class' => 'g-sidenav-hidden',
            'nav' => '2',
        ];
        return view('profile.change-password', $params);
    }
}
