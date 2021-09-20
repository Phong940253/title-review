<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 *
 */

class SelectTitleController extends Controller
{
    /**
     * return viwe select title
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $titles = DB::table('danhhieu')->select('name', 'id')->get();
        return view('users.select-title', ['titles' => $titles]);
    }

    /**
     * return object by title id
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_by_title(Request $request) {
        $html = '<option value="">Chọn đối tượng</option>';
        if ($request->id_title) {
            $html = '<option value="">Chọn đối tượng</option>';
            $objects = DB::table('doituong')
                ->join('danhhieu_doituong', 'doituong.id', '=', 'danhhieu_doituong.id_doituong')
                ->where('id_danhhieu', '=', $request->id_title)
                ->get();
            foreach ($objects as $object) {
                $html .= '<option value="'.$object->id.'">'.$object->name.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    public function submitSelect(Request $request) {
        $request->session()->put('id_title', $request->input('id_title'));
        $request->session()->put('id_object', $request->input('id_object'));
        return redirect('/');
    }
}
