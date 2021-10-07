<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ValidIdObject;
use App\Rules\ValidIdTitle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class KhoaManagerController extends Controller
{
    public function index() {
        $titles = DB::table('danhhieu')->select('name', 'id')->get();
        $params = [
            'page' => [
                'currentPage' => 'Tổng hợp đơn vị',
            ],
            'titles' => $titles,
        ];
        return view('khoa.index', $params);
    }

    /**
     * @throws Exception
     */
    public function getListUserByTitle(Request $request) {
//        if ($request->user()->can(''))
        $id_title = $request->input('id_title');
        $id_object = $request->input('id_object');

        // Validate request
        Validator::make($request->all(), [
            'id_title' => ['string', 'required', new ValidIdTitle],
            'id_object' => ['string', 'required', new ValidIdObject]
        ])->validate();

        // Get query
        $users = DB::table('users')
            ->join('unit', 'users.id_unit', '=', 'unit.id')
            ->join('users_danhhieu_doituong', 'users.id', '=', 'users_danhhieu_doituong.id_users')
            ->join('danhhieu_doituong', 'users_danhhieu_doituong.id_danhhieu_doituong', '=', 'danhhieu_doituong.id')
            ->where('id_danhhieu', '=', $id_title)
            ->where('id_doituong', '=', $id_object)
            ->where('id_unit', '=', auth()->user()->id_unit)
            ->select(['ms', 'users.name as users_name', 'gender', 'email', 'telephone', 'unit.name as unit_name', 'confirmed']);

        // get response for datatable server-side
        return DataTables::of($users)
            ->editColumn('gender', function ($user) {
                return ($user->gender ? "Nữ" : "Nam"); // Nam if value gender 0 else Nu
            })
            ->editColumn('confirmed', function ($user) {
                return '<div class="custom-toggle">
                        <input type="checkbox"' . ($user->confirmed ? ' checked' : "") . '>' .
                        '<span class="custom-toggle-slider rounded-circle"></span>
                        </div>';
            })
            ->filterColumn('users_name', function ($query, $keyword) {
                $sql = "users.name like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('unit_name', function ($query, $keyword) {
                $sql = "unit.name like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('gender', function ($query, $keyword) {
                $newKey = mb_strtolower($keyword);
                if (mb_strpos("nam", $newKey) !== false)
                    $keyword = 0;
                if (mb_strpos("nữ", $newKey) !== false)
                    $keyword = 1;
                $sql = "gender like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('confirmed', function($query, $keyword) {
                $query->whereRaw('users_danhhieu_doituong.confirmed like ?', ["%{$keyword}%"]);
            })
            ->rawColumns(['confirmed'])
            ->make(true);
    }
}
