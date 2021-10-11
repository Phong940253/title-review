<?php

namespace App\Http\Controllers;

use App\Models\UserDanhHieuDoiTuong;
use App\Models\Reply;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


/**
 *
 */
class TieuchuanController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $ProfileController = new ProfileController;
        $noidungs = $this->getNoiDung($request->id_tieuchi, $request->id_tieuchuan);
        $replies = $this->getReplies($noidungs->pluck('id'));
        $minhchungs = $this->getMinhChung($noidungs->pluck('id'));
        Log::debug($replies);
        $id_title = $request->session()->get('id_title');
        $id_object = $request->session()->get('id_object');
        $param = [
            'tieuchis' => $ProfileController->getTieuChuanTieuChi($id_title, $id_object),
            'noidungs' => $noidungs,
            'page' => $this->getBreadcrumb($request),
            'id_tieuchi' => $request->id_tieuchi,
            'id_tieuchuan' => $request->id_tieuchuan,
            'replies' => $replies,
            'minhchungs' => $minhchungs,
        ];
        return view('users.tieuchuan', $param);
    }

    /**
     * @param $id_tieuchi
     * @param $id_tieuchuan
     * @return Collection|array
     */
    public function getNoiDung($id_tieuchi, $id_tieuchuan)
    {
        if ($id_tieuchi || $id_tieuchuan) {
            if (!$id_tieuchuan) {
                $res = DB::table('noidung')
                    ->join('tieuchi', 'noidung.id_tieuchi', '=', 'tieuchi.id')
                    ->where('tieuchi.id', '=', $id_tieuchi)
                    ->select('noidung.id as id', 'tieuchi.id as id_tieuchi', 'content')
                    ->get();
            } else {
                $res = DB::table('noidung')
                    ->join('tieuchuan', 'noidung.id_tieuchuan', '=', 'tieuchuan.id')
                    ->join('tieuchi', 'tieuchuan.id_tieuchi', '=', 'tieuchi.id')
                    ->where('tieuchuan.id', '=', $id_tieuchuan)
                    ->where('tieuchi.id', '=', $id_tieuchi)
                    ->select('noidung.id as id', 'tieuchi.id as id_tieuchi', 'tieuchuan.id as id_tieuchuan', 'content')
                    ->get();
            }
            return $res;
        }
        return [];
    }

    /**
     * @param $noidungs
     * @return Collection
     */
    public function getReplies($noidungs, $id_users = false): Collection
    {

        return DB::table('replies')
            ->join('noidung', 'noidung.id', '=','replies.id_noidung')
            ->where('replies.id_users', '=', ($id_users) ? $id_users : auth()->user()->id)
            ->whereIn('noidung.id', $noidungs)
            ->select('replies.id_users', 'replies.id_noidung', 'reply')
            ->get();
    }

    /**
     * @param Request $request
     * @return array|string[]
     */
    public function getBreadcrumb(Request $request): array
    {
        $id_tieuchi = $request->id_tieuchi;
        $id_tieuchuan = $request->id_tieuchuan;
        $name_tieuchi = DB::table('tieuchi')
            ->select('name')
            ->find($request->id_tieuchi);
        if ($id_tieuchuan) {
            $name_tieuchuan = DB::table('tieuchuan')
                ->select('name')
                ->find($request->id_tieuchuan);
            $res = [
                'currentPage' => $name_tieuchuan ? $name_tieuchuan->name : "",
                'parentPage' => $name_tieuchi ? $name_tieuchi->name : "",
            ];
        } else {
            $res = [
                'currentPage' => $name_tieuchi ? $name_tieuchi->name : "",
            ];
        }
        return $res;
    }

    /**
     * @param $id_title
     * @param $id_object
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getIdDanhHieuDoiTuong($id_title, $id_object) {
         return DB::table('danhhieu_doituong')
            ->join('danhhieu', 'danhhieu.id', '=', 'id_danhhieu')
            ->join('doituong', 'doituong.id', '=', 'id_doituong')
            ->first();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function submitReply(Request $request): JsonResponse
    {

        $content = $request->input('content');
        $id_noidung = $request->input('id_noidung');
        if ($content && $id_noidung && DB::table('noidung')->where('id', $id_noidung)->exists()) {
            $reply = Reply::updateOrCreate(
                ['id_users' => auth()->user()->id, 'id_noidung' => $id_noidung],
                ['reply' => $content]
            );

            // Mark user has been edit
            $id_title = $request->session()->get('id_title');
            $id_object = $request->session()->get('id_object');
            if (isset($id_title) && isset($id_object)) {
                $id_danhhieu_doituong = $this->getIdDanhHieuDoiTuong($id_title, $id_object);
                if (isset($id_danhhieu_doituong)) {
                    $editReply = UserDanhHieuDoiTuong::updateOrCreate(
                        ['id_users' => $request->user()->id, 'id_danhhieu_doituong' => $id_danhhieu_doituong->id],
                        ['edit' => true],
                    );
                }
            }

            return Response::json([
                'success' => true,
                'message' => 'Lưu thành công!'
            ], 200);
        }
        return Response::json([
            'success' => false,
            'message' => 'Có lỗi xảy ra!'
        ], 200);
    }

    /**
     * @param $file_path
     * @return int
     */
    public function get_size($file_path): int
    {
        return Storage::size($file_path);
    }

    /**
     * @param $noidungs
     * @return Collection
     */
    public function getMinhChung($noidungs, $id_users = false): Collection
    {
        Log::debug($noidungs);
        return DB::table('uploads')
            ->where('id_users', '=', ($id_users) ? $id_users : auth()->user()->id)
            ->whereIn('id_noidung', $noidungs)
            ->select('id_noidung', 'original_name', 'url', 'size')
            ->get();
    }
}
