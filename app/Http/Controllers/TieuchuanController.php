<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $param = [
            'tieuchis' => ProfileController::getTieuChuanTieuChi($request),
            'noidungs' => $this->getNoiDung($request),
            'page' => $this->getBreadcrumb($request),
            'id_tieuchi' => $request->id_tieuchi,
            'id_tieuchuan' => $request->id_tieuchuan,
        ];
        return view('users.tieuchuan', $param);
    }

    /**
     * @param Request $request
     * @return Collection|array
     */
    public static function getNoiDung(Request $request)
    {
        $id_tieuchi = $request->id_tieuchi;
        $id_tieuchuan = $request->id_tieuchuan;
        if ($id_tieuchi || $id_tieuchuan) {
            if (!$id_tieuchuan) {
                $res = DB::table('noidung')
                    ->join('tieuchi', 'noidung.id_tieuchi', '=', 'tieuchi.id')
                    ->get();
            }
            //            Log::debug($res);

            $res = DB::table('noidung')
                ->join('tieuchuan', 'noidung.id_tieuchuan', '=', 'tieuchuan.id')
                ->join('tieuchi', 'tieuchuan.id_tieuchi', '=', 'tieuchi.id')
                ->where('tieuchuan.id', '=', $id_tieuchuan)
                ->where('tieuchi.id', '=', $id_tieuchi)
                ->get();
            return $res;
        }
        return [];
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
                'currentPage' => $name_tieuchuan->name,
                'parrentPage' => $name_tieuchi->name,
            ];
        } else {
            $res = [
                'currentPage' => $name_tieuchi->name,
            ];
        }
        return $res;
    }
}
