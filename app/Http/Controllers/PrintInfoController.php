<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintInfoController extends Controller
{
    public function index(Request $request) {
        $ProfileController = new ProfileController;
        $id_title = $request->session()->get('id_title');
        $id_object = $request->session()->get('id_object');
        $params = [
            'tieuchis' => $ProfileController->getTieuChuanTieuChi($id_title, $id_object),
        ];
        return view('users.print-info', $params);
    }
}
