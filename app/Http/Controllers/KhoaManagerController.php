<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class KhoaManagerController extends Controller
{
    public function index() {
        $params = [
            'page' => [
                'currentPage' => 'Tổng hợp đơn vị',
            ],
        ];
        return view('khoa.index', $params);
    }
}
