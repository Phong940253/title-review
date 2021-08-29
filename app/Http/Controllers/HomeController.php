<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $id_title = $request->session()->get('id_title');
        $id_object = $request->session()->get('id_object');
        $tieuchis = [];
        if (!is_null($id_title) && !(is_null($id_object))) {
            $tieuchis = DB::table('tieuchi')
                ->select('name', 'tieuchi.id')
                ->join('danhhieu_doituong', 'tieuchi.id_danhhieu_doituong', '=', 'danhhieu_doituong.id')
                ->where('id_danhhieu', '=', $id_title)
                ->where('id_doituong', '=', $id_object)
                ->get();
            foreach ($tieuchis as $tieuchi) {
                $tieuchuan = DB::table('tieuchuan')
                    ->select('name', 'id')
                    ->where('id_tieuchi', '=', $tieuchi->id)
                    ->get();
                $tieuchi->tieuchuans = $tieuchuan;
            }
        }
        return view('dashboard', ['tieuchis' => $tieuchis]);
    }
}
