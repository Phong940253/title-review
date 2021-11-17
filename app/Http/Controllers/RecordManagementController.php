<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class RecordManagementController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {
        $ProfileController = new ProfileController();
        $titles = DB::table('danhhieu')->select('name', 'id')->get();
        $unit = $ProfileController->getUnit(NULL);
        $unit .= '<option value="0">Tất cả đơn vị</option>';
        $params = [
            'nav' => 5,
            'page' => [
                'currentPage' => "Quản lý hồ sơ",
            ],
            'titles' => $titles,
            'unit' => $unit,
            'class' => 'g-sidenav-hidden',
        ];
        return view('manager.record-management', $params);
    }
}
