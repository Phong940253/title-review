<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use App\Models\Reply;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
        $noidungs = $this->getNoiDung($request->id_tieuchi, $request->id_tieuchuan);
        $replies = $this->getReplies($noidungs->pluck('id'));
        Log::debug($replies);
        $param = [
            'tieuchis' => ProfileController::getTieuChuanTieuChi($request),
            'noidungs' => $noidungs,
            'page' => $this->getBreadcrumb($request),
            'id_tieuchi' => $request->id_tieuchi,
            'id_tieuchuan' => $request->id_tieuchuan,
            'replies' => $replies
        ];
        return view('users.tieuchuan', $param);
    }

    /**
     * @param Request $request
     * @return Collection|array
     */
    public static function getNoiDung($id_tieuchi, $id_tieuchuan)
    {
        if ($id_tieuchi || $id_tieuchuan) {
            if (!$id_tieuchuan) {
                $res = DB::table('noidung')
                    ->join('tieuchi', 'noidung.id_tieuchi', '=', 'tieuchi.id')
                    ->select('noidung.id as id', 'tieuchi.id as id_tieuchi', 'content')
                    ->get();
            }
            //            Log::debug($res);

            $res = DB::table('noidung')
                ->join('tieuchuan', 'noidung.id_tieuchuan', '=', 'tieuchuan.id')
                ->join('tieuchi', 'tieuchuan.id_tieuchi', '=', 'tieuchi.id')
                ->where('tieuchuan.id', '=', $id_tieuchuan)
                ->where('tieuchi.id', '=', $id_tieuchi)
                ->select('noidung.id as id', 'tieuchi.id as id_tieuchi', 'tieuchuan.id as id_tieuchuan', 'content')
                ->get();
            return $res;
        }
        return [];
    }

    public function getReplies($noidungs) {
        $replies = DB::table('replies')
            ->join('noidung', 'noidung.id', '=','replies.id_noidung')
            ->where('replies.id_users', '=', auth()->user()->id)
            ->whereIn('noidung.id', $noidungs)
            ->select('replies.id_users', 'replies.id_noidung', 'reply')
            ->get();
        return $replies;
    }

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
                'parrentPage' => $name_tieuchi ? $name_tieuchi->name : "",
            ];
        } else {
            $res = [
                'currentPage' => $name_tieuchi ? $name_tieuchi->name : "",
            ];
        }
        return $res;
    }

    public function submitReply(Request $request)
    {
        $content = $request->input('content');
        $id_noidung = $request->input('id_noidung');
        if ($content && $id_noidung && DB::table('noidung')->where('id', $id_noidung)->exists()) {
            $reply = Reply::updateOrCreate(
                ['id_users' => auth()->user()->id, 'id_noidung' => $id_noidung],
                ['reply' => $content]
            );
            return Response::json([
                'success' => true,
                'message' => 'Lưu thành công'
            ], 200);
        }
        return Response::json([
            'success' => false,
            'message' => 'Có lỗi xảy ra'
        ], 400);
    }

    public function get_size($file_path): int
    {
        return Storage::size($file_path);
    }

    public function getMinhChung(Request $request) {

    }
}
