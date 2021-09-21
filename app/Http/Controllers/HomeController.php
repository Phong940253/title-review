<?php

namespace App\Http\Controllers;

use anlutro\LaravelSettings\Facade as Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $tieuchis = ProfileController::getTieuChuanTieuChi($request);
        $nations = ProfileController::getNation();
        return view('profile.edit', ['tieuchis' => $tieuchis, 'nations' => $nations]);
    }
}
