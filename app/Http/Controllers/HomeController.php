<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tieuchis = DB::table('tieuchi')->select('name', 'id')->where('id_danhhieu', '=', 1)->get();
        foreach ($tieuchis as $tieuchi) {
            $tieuchuan = DB::table('tieuchuan')->select('name', 'id')->where('id_tieuchi', '=', $tieuchi->id)->get();
            $tieuchi->tieuchuans = $tieuchuan;
        }
        return view('dashboard', ['tieuchis' => $tieuchis]);
    }
}
