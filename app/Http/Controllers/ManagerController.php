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

class ManagerController extends Controller
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
            ->select(['users.id as id', 'ms', 'users.name as users_name', 'gender', 'email', 'telephone', 'unit.name as unit_name', 'confirmed', 'id_danhhieu_doituong']);

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

    public function getUser(Request $request) {
        $id_danhhieu_doituong = $request->input('id_danhhieu_doituong');
        $id_users = $request->input('id_users');

        Log::debug('get user');

        $xet_duyet = DB::table('users_danhhieu_doituong')
            ->where('id_danhhieu_doituong', '=', $id_danhhieu_doituong)
            ->where('id_users', '=', $id_users)
            ->first();

        $user = User::find($id_users);
        $temp = Setting('nation' . $user->nation);
        $nation = '<option value="'. $user->nation . '" selected disabled>' . ($temp ? $temp : "Không có") . '</option>';
        $temp = DB::table('religion')->find($user->id_religion);
        $religion = '<option value="'. $user->id_religion . '" selected disabled>' . ($temp ? $temp->name : "Không có") . '</option>';
        $temp = DB::table('provinces')->find($user->id_province);
        $city = '<option value="'. $user->id_province . '" selected disabled>' . ($temp ? $temp->name : "Không có") . '</option>';
        $temp = DB::table('districts')->find($user->id_district);
        $district = '<option value="'. $user->id_district . '" selected disabled>' . ($temp ? $temp->name : "Không có") . '</option>';
        $temp = DB::table('wards')->find($user->id_ward);
        $ward = '<option value="'. $user->id_ward . '" selected disabled>' . ($temp ? $temp->name : "Không có") . '</option>';
        $temp = DB::table('provinces')->find($user->id_current_province);
        $current_city = '<option value="'. $user->id_current_province . '" selected disabled>' . ($temp ? $temp->name : "Không có") . '</option>';
        $temp = DB::table('districts')->find($user->id_district);
        $current_district = '<option value="'. $user->id_currnet_district . '" selected disabled>' . ($temp ? $temp->name : "Không có") . '</option>';
        $temp = DB::table('wards')->find($user->id_ward);
        $current_ward = '<option value="'. $user->id_current_ward . '" selected disabled>' . ($temp ? $temp->name : "Không có") . '</option>';
        $temp = DB::table('unit')->find($user->id_unit);
        $unit = '<option value="'. $user->id_unit . '" selected disabled>' . ($temp ? $temp->name : "Không có") . '</option>';
        $year = '<option value="'. $user->year . '" selected disabled>' . ($user->year ? $user->year : "Không có") . '</option>';

        $ProfileController = new ProfileController;
        $tieuchis = $ProfileController->getTieuChuanTieuChi(NULL, NULL, $id_danhhieu_doituong);

        $params = [
            'user' => $user,
            'nation' => $nation,
            'religion' => $religion,
            'city' => $city,
            'district' => $district,
            'ward' => $ward,
            'current_city' => $current_city,
            'current_district' => $current_district,
            'current_ward' => $current_ward,
            'unit' => $unit,
            'year' => $year,
            'tieuchis' => $tieuchis,
            'xet_duyet' => $xet_duyet,
            'id_danhhieu_doituong' => $id_danhhieu_doituong
        ];
//        Log::debug($user);
        return view('khoa.duyet', $params);
    }

    public function acceptDeCu(Request $request) {
        $id_danhhieu_doituong = $request->input('id_danhhieu_doituong');
        $id_users = $request->input('id_users');
        $confirmed = $request->input('confirmed');
        $update =  DB::table('users_danhhieu_doituong')
            ->updateOrInsert(
                ['id_users' => $id_users, 'id_danhhieu_doituong' => $id_danhhieu_doituong],
                ['confirmed'=> $confirmed == "on"],
            );
        return ($update) ? Response::json([
            'success' => true,
            'message' => 'Lưu thành công!'
        ], 200) : Response::json([
            'success' => false,
            'message' => 'Lưu thất bại!'
        ], 200);
    }
}
