<?php

namespace App\Http\Controllers;

use App\Rules\ValidIdObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ManagerObjectsController extends Controller
{
    public function index(Request $request) {
        $params = [
            'nav' => 1,
            'subnav' => 2,
            'page' => [
                'currentPage' => "Quản lý đối tượng",
                'parentPage' => "Quản lý danh hiệu",
            ]
        ];
        return view('manager.list-object', $params);
    }

    public function getObjects() {
        $object = DB::table('doituong')
            ->join('danhhieu_doituong', 'doituong.id', '=', 'danhhieu_doituong.id_doituong')
            ->join('danhhieu', 'danhhieu.id', '=','danhhieu_doituong.id_danhhieu')
            ->select(DB::raw("group_concat(danhhieu.name SEPARATOR ', ') as name_title, doituong.id, doituong.name, doituong.created_at, doituong.updated_at"))
            ->groupBy('doituong.id', 'doituong.name', 'doituong.created_at', 'doituong.updated_at')
            ->get();
        return DataTables::of($object)->make(true);
    }

    public function viewObject(Request $request) {
        Validator::make($request->all(), ['id' => ['string', 'required', new ValidIdObject]])->validate();
        $listTitleByObject = DB::table('danhhieu_doituong')
            ->rightJoin('danhhieu', 'danhhieu.id', '=', 'danhhieu_doituong.id_danhhieu')
            ->where('danhhieu_doituong.id_doituong', '=', $request->input('id'))
            ->orWhereNull('danhhieu_doituong.id')
            ->select('danhhieu.id', 'danhhieu.name', 'danhhieu_doituong.id_doituong')
            ->get();
        $object = DB::table('doituong')->find($request->input('id'));
        $html = '';
        foreach ($listTitleByObject as $title) {
            $html .= '<option ' . (isset($title->id_doituong) ? "selected" : "") . ' value="' . $title->id . '">' . $title->name . '</option>';
        };

        $params = [
            'object' => $object,
            'listTitle' => $html,
        ];
        return view('manager.view-object', $params);
    }

    public function viewAddObject(Request $request)
    {
        $listTitle = DB::table('danhhieu')->get();
        $html = '';
        foreach ($listTitle as $title) {
            $html .= '<option value="' . $title->id . '">' . $title->name . '</option>';
        };
        $params = [
            'listTitle' => $html,
        ];
        return view('manager.view-object', $params);
    }
}
