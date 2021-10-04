<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class KhoaManagerController extends Controller
{
    public function index() {
        return view('khoa.index');
    }
}
