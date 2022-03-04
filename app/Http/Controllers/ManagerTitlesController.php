<?php

namespace App\Http\Controllers;

use App\Rules\ValidIdTitle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ManagerTitlesController extends Controller
{
    public function Title(Request $request) {
        $params = [
            'nav' => 1,
            'subnav' => 1,
            'page' => [
                'currentPage' => "Danh hiệu",
                'parentPage' => "Quản lý",
            ]
        ];
        return view('manager.list-title', $params);
    }

    public function getTitle(Request $request) {
        $title = DB::table('danhhieu')->get();
        return DataTables::of($title)->make(true);
    }

    public function viewTitle(Request $request) {
        $id_title = $request->input('id_title');
        $request->validate([
            'id_title' => ['string', 'required', new ValidIdTitle],
        ]);
        $title = DB::table('danhhieu')->find($id_title);
        $params = [
            'title' => $title,
        ];
        return view('manager.view-title', $params);
    }

    public function editTitle(Request $request) {
        if (! $request->input('id'))
            return $this->addTitle($request);
        Validator::make($request->all(), [
            'id' => ['string', 'required', new ValidIdTitle],
            'name' => ['string', 'required'],
            'start' => ['required', 'date_format:Y-m-d\TH:i'],
            'finish' => ['required', 'date_format:Y-m-d\TH:i']
        ])->validate();

        $update = DB::Table('danhhieu')
            ->updateOrInsert(
                ['id' => $request->input('id')],
                [
                    'name' => $request->input('name'),
                    'start' => $request->input('start'),
                    'finish' => $request->input('finish'),
                    'updated_at' => now()
                ]
            );
        return ($update) ? Response::json([
            'success' => true,
            'message' => 'Lưu thành công!'
        ], 200) : Response::json([
            'success' => false,
            'message' => 'Không thay đổi!'
        ], 200);
    }

    public function deleteTitle(Request $request): JsonResponse
    {
        Validator::make($request->all(), ['id' => ['string', 'required', new ValidIdTitle]])->validate();
        $update = DB::table('danhhieu')->where('id', '=', $request->input('id'))->delete();
        return ($update) ? Response::json([
            'success' => true,
            'message' => 'Xoá thành công!'
        ], 200) : Response::json([
            'success' => false,
            'message' => 'Không thay đổi!'
        ], 200);
    }

    public function viewAddTitle(Request $request)
    {
        $params = [];
        return view('manager.view-title', $params);
    }

    public function addTitle(Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'name' => ['string', 'required'],
            'start' => ['required', 'date_format:Y-m-d\TH:i'],
            'finish' => ['required', 'date_format:Y-m-d\TH:i'],
        ])->validate();
        $create = DB::table('danhhieu')->insert([
            'name' => $request->input('name'),
            'start' => $request->input('start'),
            'finish' => $request->input('finish'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return ($create) ? Response::json([
            'success' => true,
            'message' => 'Tạo thành công!'
        ], 200) : Response::json([
            'success' => false,
            'message' => 'Không thay đổi!'
        ], 200);
    }
}
