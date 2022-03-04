<?php

namespace App\Http\Controllers;

use App\Rules\ValidIdObject;
use App\Rules\ValidIdTitle;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Throwable;
use Yajra\DataTables\DataTables;

/**
 *
 */
class ManagerObjectsController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request) {
        $params = [
            'nav' => 1,
            'subnav' => 2,
            'page' => [
                'currentPage' => "Đối tượng",
                'parentPage' => "Quản lý",
            ]
        ];
        return view('manager.list-object', $params);
    }

    /**
     * @throws ValidationException
     * @throws Throwable
     */
    public function addObject(Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'name' => ['string', 'required'],
            'id_title' => ['array'],
            'id_title.*' => ['string', new ValidIdTitle]
        ])->validate();

        try {
            DB::transaction(function () use ($request) {
                $id = DB::table('doituong')->insertGetId([
                    'name' => $request->input('name'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                foreach ($request->input('id_title') as $id_title) {
                    DB::table('danhhieu_doituong')->insert([
                        'id_danhhieu' => $id_title,
                        'id_doituong' => $id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                };
            }, 2);

            return Response::json([
                'success' => true,
                'message' => 'Tạo thành công!'
            ], 200);
        } catch (Exception $e) {
            // return nếu thất bại
            return Response::json([
                'success' => false,
                'message' => 'Không thay đổi!'
            ], 200);
        }
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getObjects() {
        $object = DB::table('doituong')
            ->join('danhhieu_doituong', 'doituong.id', '=', 'danhhieu_doituong.id_doituong')
            ->join('danhhieu', 'danhhieu.id', '=','danhhieu_doituong.id_danhhieu')
            ->select(DB::raw("group_concat(danhhieu.name SEPARATOR ', ') as name_title, doituong.id, doituong.name, doituong.created_at, doituong.updated_at"))
            ->groupBy('doituong.id', 'doituong.name', 'doituong.created_at', 'doituong.updated_at')
            ->get();
        return DataTables::of($object)->make(true);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     * @throws ValidationException
     */
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

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
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

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     * @throws Throwable
     */
    public function editObject(Request $request): JsonResponse
    {
        if (!$request->input('id'))
            return $this->addObject($request);
        Validator::make($request->all(), [
            'id' => ['string', 'required', new ValidIdObject],
            'name' => ['string', 'required'],
            'id_title' => ['array'],
            'id_title.*' => ['string', new ValidIdTitle]
        ])->validate();
        try {
            DB::transaction(function () use ($request) {
                // Update đối tượng
                DB::Table('doituong')
                    ->updateOrInsert(
                        ['id' => $request->input('id')],
                        [
                            'name' => $request->input('name'),
                            'updated_at' => now()
                        ]
                    );

                // Xóa danh hiệu đối tượng không tồn tại
                DB::table('danhhieu_doituong')
                    ->where('id_doituong', '=', $request->input('id'))
                    ->whereNotIn('id_danhhieu', $request->input('id_title'))
                    ->delete();

                // Update quan hệ danh hiệu đối tượng
                foreach($request->input('id_title') as $id_title) {
                    DB::table('danhhieu_doituong')
                        ->updateOrInsert(
                            [
                                'id_doituong' => $request->input('id'),
                                'id_danhhieu' => $id_title
                            ],
                            ['updated_at' => now()]
                        );
                }
            }, 2);

            return Response::json([
                'success' => true,
                'message' => 'Lưu thành công!'
            ], 200);
        } catch (Exception $e) {
            // Case lỗi
            return Response::json([
                'success' => true,
                'message' => 'Không thay đổi!'
            ], 200);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function deleteObject(Request $request): JsonResponse
    {
        Validator::make($request->all(), ['id' => ['string', 'required', new ValidIdObject]])->validate();
        $update = DB::table('doituong')->where('id', '=', $request->input('id'))->delete();
        return ($update) ? Response::json([
            'success' => true,
            'message' => 'Xoá thành công!'
        ], 200) : Response::json([
            'success' => false,
            'message' => 'Không thay đổi!'
        ], 200);
    }

}
