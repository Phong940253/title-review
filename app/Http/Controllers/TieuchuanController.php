<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;

class TieuchuanController extends Controller
{
    //
    public function index(Request $request) {
        $tieuchis = ProfileController::getTieuChuanTieuChi($request);
        return view('users.tieuchuan', ['tieuchis' => $tieuchis]);
    }
}
