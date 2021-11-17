<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ValidIdObject;
use App\Rules\ValidIdTitle;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

/**
 *
 */
class ManagerController extends Controller
{
    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $titles = DB::table('danhhieu')->select('name', 'id')->get();
        $unit = "";
        if (auth()->user()->hasRole('truong')) {
            $ProfileController = new ProfileController();
            $unit = $ProfileController->getUnit(NULL);
        }
        $params = [
            'page' => [
                'currentPage' => 'Tổng hợp đơn vị',
            ],
            'titles' => $titles,
            'unit' => $unit,
            'class' => 'g-sidenav-hidden',
        ];
        return view('manager.index', $params);
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
        $danhhieu_doituong = DB::table('danhhieu_doituong')
            ->where('id_danhhieu', '=', $id_title)
            ->where('id_doituong', '=', $id_object);

        $users = DB::table('users')
            ->join('users_danhhieu_doituong', 'users.id', '=', 'users_danhhieu_doituong.id_users')
            ->joinSub($danhhieu_doituong, 'danhhieu_doituong', function($join) {
                $join->on('id_danhhieu_doituong', '=', 'danhhieu_doituong.id');
            });

        if ($request->user()->hasRole('khoa')) {
            $users = $users
                ->where('id_unit', '=', auth()->user()->id_unit)
                ->select(['users.id', 'users.ms', 'users.name as name', 'users.gender', 'users.email', 'users.telephone', 'confirmed', 'id_danhhieu_doituong']);
        }
        if ($request->user()->hasRole('truong')) {
            $request->validate(['id_unit' => ['string', 'required', 'exists:unit,id']]);
            $id_unit = $request->input('id_unit');
            $users = $users
                ->where('users.id_unit', '=', $id_unit)
                ->leftJoin('users AS approve', 'users_danhhieu_doituong.id_approved', '=', 'approve.id')
                ->leftJoin('users AS rank', 'users_danhhieu_doituong.id_user_ranked', '=', 'rank.id')
                ->select(['users.id', 'users.ms', 'users.name as name', 'users.gender', 'users.telephone', 'confirmed', 'id_danhhieu_doituong', 'approve.name as approved_name', 'users_danhhieu_doituong.rank as xeploai', 'rank.name as ranked_name']);
        }
        if ($request->user()->hasRole('admin')) {
            $id_unit = $request->input('id_unit');
            if ($id_unit)
                $users = $users->where('users.id_unit', '=', $id_unit);
            $users = $users
                ->join('unit', 'users.id_unit', '=', 'unit.id')
                ->leftJoin('users AS approve', 'users_danhhieu_doituong.id_approved', '=', 'approve.id')
                ->leftJoin('users AS rank', 'users_danhhieu_doituong.id_user_ranked', '=', 'rank.id')
                ->select(['users.id', 'users.ms', 'users.name as name', 'users.telephone', 'users.email', 'unit.name as unit_name', 'confirmed', 'id_danhhieu_doituong', 'approve.name as approved_name', 'users_danhhieu_doituong.rank as xeploai', 'rank.name as ranked_name', 'comment', 'comment_special']);
        }

        // get response for datatable server-side
        $table = DataTables::of($users)
            ->editColumn('confirmed', function ($user) {
                return '<div class="custom-toggle">
                        <input type="checkbox"' . ($user->confirmed ? ' checked' : "") . '>' .
                    '<span class="custom-toggle-slider rounded-circle"></span>
                        </div>';
            })
            ->filterColumn('id', function ($query, $keyword) {
                $sql = "users.id like ?";
                $query->where($sql, ["${keyword}%"]);
            })
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "users.name like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('email', function ($query, $keyword) {
                $sql = "users.email like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('telephone', function ($query, $keyword) {
                $sql = "users.telephone like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('confirmed', function($query, $keyword) {
                $query->whereRaw('users_danhhieu_doituong.confirmed like ?', ["%{$keyword}%"]);
            });
        if ($request->user()->hasRole('khoa')) {
            $table = $table
                ->editColumn('gender', function ($user) {
                    return ($user->gender ? "Nữ" : "Nam"); // Nam if value gender 0 else Nu
                })
                ->filterColumn('gender', function ($query, $keyword) {
                    $newKey = mb_strtolower($keyword);
                    if (mb_strpos("nam", $newKey) !== false)
                        $keyword = 0;
                    if (mb_strpos("nữ", $newKey) !== false)
                        $keyword = 1;
                    $sql = "users.gender like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                });
        }
        if ($request->user()->hasRole('truong')) {
            $table = $table
                ->editColumn('gender', function ($user) {
                    return ($user->gender ? "Nữ" : "Nam"); // Nam if value gender 0 else Nu
                })
                ->filterColumn('gender', function ($query, $keyword) {
                    $newKey = mb_strtolower($keyword);
                    if (mb_strpos("nam", $newKey) !== false)
                        $keyword = 0;
                    if (mb_strpos("nữ", $newKey) !== false)
                        $keyword = 1;
                    $sql = "users.gender like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('approved_name', function ($query, $keyword) {
                    $sql = "approve.name like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('xeploai', function($query, $keyword) {
                    $query->whereRaw('users_danhhieu_doituong.rank like ?', ["%{$keyword}%"]);
                })
                ->filterColumn('ranked_name', function($query, $keyword) {
                    $query->whereRaw('users_danhhieu_doituong.rank like ?', ["%{$keyword}%"]);
                })
                ->addColumn('bao-cao', function($query) {
                   return '<a target="_blank" href="' . route('phieu-tham-dinh') . '?id_danhhieu_doituong=' . $query->id_danhhieu_doituong . '&id_user=' . $query->id . '"><i class="fas fa-eye"></i></a>';
                });
        }
        if ($request->user()->hasRole('admin')) {
            $table = $table
                ->filterColumn('approved_name', function ($query, $keyword) {
                    $sql = "approve.name like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('xeploai', function($query, $keyword) {
                    $query->whereRaw('users_danhhieu_doituong.rank like ?', ["%{$keyword}%"]);
                })
                ->filterColumn('ranked_name', function($query, $keyword) {
                    $query->whereRaw('users_danhhieu_doituong.rank like ?', ["%{$keyword}%"]);
                })
                ->filterColumn('unit_name', function($query, $keyword) {
                    $query->whereRaw('unit.name like ?', ["%{$keyword}%"]);
                })
                ->filterColumn('comment', function($query, $keyword) {
                    $query->whereRaw('users_danhhieu_doituong.comment like ?', ["%{$keyword}%"]);
                })
                ->filterColumn('comment_special', function($query, $keyword) {
                    $query->whereRaw('users_danhhieu_doituong.comment_special like ?', ["%{$keyword}%"]);
                });
        }
        $table = $table
            ->rawColumns(auth()->user()->hasRole('truong') ? ['confirmed', 'bao-cao'] : ['confirmed'])
            ->make(true);
        return $table;
    }

    /**
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
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
            'id_danhhieu_doituong' => $id_danhhieu_doituong,
        ];
//        Log::debug($user);
        return view('manager.duyet', $params);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function acceptDeCu(Request $request): JsonResponse
    {
        $id_danhhieu_doituong = $request->input('id_danhhieu_doituong');
        $id_users = $request->input('id_users');
        $confirmed = $request->input('confirmed');
        $update =  DB::table('users_danhhieu_doituong')
            ->updateOrInsert(
                ['id_users' => $id_users, 'id_danhhieu_doituong' => $id_danhhieu_doituong],
                [
                    'confirmed'=> $confirmed == "on",
                    'id_approved' => $confirmed ? $request->user()->id : NULL,
                    'updated_at' => now()
                ],
            );
        return Response::json([
            'success' => true,
            'message' => 'Lưu thành công!'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function submitComment(Request $request): JsonResponse
    {
        $id_noidung = $request->input('id_noidung');
        $comment = $request->input('comment');
        $id_users = $request->input('id_users');
        $evaluate =$request->input('evaluate');
        $update = DB::table('replies')
            ->updateOrInsert(
                ['id_noidung' => $id_noidung, 'id_users' => $id_users],
                ['comment' => $comment ?? "", 'evaluate' => $evaluate ?? "", 'updated_at' => now()]
            );
        return ($update) ? Response::json([
            'success' => true,
            'message' => 'Lưu thành công!'
        ], 200) : Response::json([
            'success' => false,
            'message' => 'không thay đổi!'
        ], 200);
    }

    public function submitRank(Request $request) {
        $id_danhhieu_doituong = $request->input('id_danhhieu_doituong');
        $id_users = $request->input('id_users');
        $update =  DB::table('users_danhhieu_doituong')
            ->updateOrInsert(
                ['id_users' => $id_users, 'id_danhhieu_doituong' => $id_danhhieu_doituong],
                [
                    'rank' => $request->input('rank'),
                    'comment'=> $request->input('comment'),
                    'comment_special' => $request->input('comment_special'),
                    'updated_at' => now(),
                    'id_user_ranked' => $request->user()->id,
                ],
            );
        return Response::json([
            'success' => true,
            'message' => 'Lưu thành công!'
        ]);
    }
}
