<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

/**
 *
 */
class UnitStatisticController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {
        $titles = DB::table('danhhieu')->select('name', 'id')->get();
        $params = [
            'nav' => 6,
            'page' => [
                'currentPage' => "Thống kê đơn vị",
            ],
            'titles' => $titles,
            'class' => 'g-sidenav-hidden',
        ];
        return view('manager.unit-statistic', $params);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getUnitByIdTitle(Request $request): string
    {
        $request->validate(['id_title' => ['required', 'string', 'exists:danhhieu,id']]);
        $units = $this->getObjectByIdTitle( $request->input('id_title'));
        return $units->toJson();
    }

    public function getObjectByIdTitle($id_unit): Collection
    {
        return DB::table('doituong')
            ->join('danhhieu_doituong', 'doituong.id', '=', 'danhhieu_doituong.id_doituong')
            ->where('id_danhhieu', '=', $id_unit)
            ->select('doituong.name', 'doituong.id')
            ->get();
    }

    public function getListUnitStatistic(Request $request)
    {
        $request->validate(['id_title' => ['required', 'string', 'exists:danhhieu,id']]);
        $id_title = $request->input('id_title');
        $objects = $this->getObjectByIdTitle($id_title);
        $selecting = "name";
        foreach ($objects as $object) {
            $selecting .= ", CONCAT(MAX(CASE WHEN ketqua.id = {$object->id} THEN ketqua.duyet ELSE NULL END), '/', MAX(CASE WHEN ketqua.id = {$object->id} THEN ketqua.tonghop ELSE NULL END)) AS '{$object->id}'";
        }
        $selecting .= ", CONCAT(SUM(duyet), '/', SUM(tonghop)) AS 'tonghop'";

        $statistic = DB::table('users')
            ->join('users_danhhieu_doituong', 'users_danhhieu_doituong.id_users', '=', 'users.id')
            ->join('danhhieu_doituong', 'danhhieu_doituong.id', '=', 'users_danhhieu_doituong.id_danhhieu_doituong')
            ->join('unit', 'users.id_unit', '=', 'unit.id')
            ->groupBy('unit.name', 'danhhieu_doituong.id_doituong')
            ->selectRaw("unit.name as name, danhhieu_doituong.id_doituong as id, COUNT(CASE WHEN users_danhhieu_doituong.confirmed = 1 THEN 1 END) as 'duyet', COUNT(users_danhhieu_doituong.confirmed) as 'tonghop'");
        $res = DB::table(DB::raw("({$statistic->toSql()}) as ketqua"))
            ->mergeBindings($statistic)
            ->selectRaw($selecting)
            ->groupByRaw("name");
        Log::debug($res->toSql());
        return DataTables::of($res)->make(true);;
    }
}
