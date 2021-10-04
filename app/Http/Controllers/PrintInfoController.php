<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintInfoController extends Controller
{
    public function index(Request $request) {
        $ProfileController = new ProfileController;
        $params = [
            'tieuchis' => $ProfileController->getTieuChuanTieuChi($request),
        ];
        return view('users.print-info', $params);
    }
}
