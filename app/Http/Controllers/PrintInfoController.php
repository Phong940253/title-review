<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class PrintInfoController extends Controller
{
    public function index(Request $request) {
        $ProfileController = new ProfileController;
        $id_title = $request->session()->get('id_title');
        $id_object = $request->session()->get('id_object');
        $birthDay = "không có";
        if (auth()->user()->birthDay)
            $birthDay = Carbon::createFromFormat('Y-m-d', auth()->user()->birthDay)->format('d/m/Y');
        $date_admission_doan = "không có";
        if (auth()->user()->date_admission_doan)
            $date_admission_doan = Carbon::createFromFormat('Y-m-d', auth()->user()->date_admission_doan)->format('d/m/Y');
        $date_admission_dang_reserve = 'không có';
        if (auth()->user()->date_admission_dang_reserve)
            $date_admission_dang_reserve = Carbon::createFromFormat('Y-m-d', auth()->user()->date_admission_dang_reserve)->format('d/m/Y');
        $date_admission_dang_official = "không có";
            $date_admission_dang_official = Carbon::createFromFormat('Y-m-d', auth()->user()->date_admission_dang_official)->format('d/m/Y');
        $params = [
            'tieuchis' => $ProfileController->getTieuChuanTieuChi($id_title, $id_object),
            'user' => auth()->user(),
            'birthDay' => $birthDay,
            'date_admission_doan' => $date_admission_doan,
            'date_admission_dang_reserve' => $date_admission_dang_reserve,
            'date_admission_dang_official' => $date_admission_dang_official,
        ];
        return view('users.print-info', $params);
    }
}
