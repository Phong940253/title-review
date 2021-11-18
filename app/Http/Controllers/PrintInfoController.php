<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrintInfoController extends Controller
{
    public function index(Request $request) {
        $ProfileController = new ProfileController;
        $id_title = $request->session()->get('id_title');
        $id_object = $request->session()->get('id_object');
        if (auth()->user()->hasRole('khoa')) {
            $id_title = $request->input('id_title');
            $id_object = $request->input('id_object');
            $request->validate(['id_user' => ['required', 'string', 'exists:users,id']]);
            $user = DB::table('users')->find($request->input('id_user'));
        }
        else $user = auth()->user();
        $birthDay = "không có";
        if ($user->birthDay)
            $birthDay = Carbon::createFromFormat('Y-m-d', $user->birthDay)->format('d/m/Y');
        $date_admission_doan = "không có";
        if ($user->date_admission_doan)
            $date_admission_doan = Carbon::createFromFormat('Y-m-d', $user->date_admission_doan)->format('d/m/Y');
        $date_admission_dang_reserve = 'không có';
        if ($user->date_admission_dang_reserve)
            $date_admission_dang_reserve = Carbon::createFromFormat('Y-m-d', $user->date_admission_dang_reserve)->format('d/m/Y');
        $date_admission_dang_official = "không có";
        if ($user->date_admission_dang_official)
            $date_admission_dang_official = Carbon::createFromFormat('Y-m-d', $user->date_admission_dang_official)->format('d/m/Y');
        $params = [
            'tieuchis' => $ProfileController->getTieuChuanTieuChi($id_title, $id_object),
            'user' => $user,
            'birthDay' => $birthDay,
            'date_admission_doan' => $date_admission_doan,
            'date_admission_dang_reserve' => $date_admission_dang_reserve,
            'date_admission_dang_official' => $date_admission_dang_official,
            'id_title' => $id_title,
            'id_object' => $id_object

        ];
        return view('users.print-info', $params);
    }

    public function printListRecord(Request $request) {
        $user = auth()->user();
        $ProfileController = new ProfileController;
        $TieuchuanController = new TieuchuanController();

        $id_danhhieu_doituong = $request->input('id_danhhieu_doituong');

        $danhhieu_doituong = DB::table('danhhieu_doituong')
            ->join('danhhieu', 'danhhieu.id', '=', 'danhhieu_doituong.id_danhhieu')
            ->where('danhhieu_doituong.id', '=', $id_danhhieu_doituong)
            ->first();
        $id_title = $request->input('id_title');
        $id_object = $request->input('id_object');
        $tieuchis = $ProfileController->getTieuChuanTieuChi($id_title, $id_object);
        $count_tieuchuan = 0;
        foreach ($tieuchis as $tieuchi) {
            if (count($tieuchi->tieuchuans) <= 0) {
                $tieuchi->noidungs = $TieuchuanController->getNoidung($tieuchi->id, NULL);
                $count_tieuchuan += 1;
            } else $count_tieuchuan += count($tieuchi->tieuchuans);
            foreach ($tieuchi->tieuchuans as $tieuchuan)
                $tieuchuan->noidungs = $TieuchuanController->getNoidung($tieuchi->id, $tieuchuan->id);
        }

        $list_user = DB::table('users')
            ->where('id_unit', '=', $user->id_unit)
            ->join('users_danhhieu_doituong', 'users_danhhieu_doituong.id_users', '=', 'users.id')
            ->join('danhhieu_doituong', 'danhhieu_doituong.id', '=', 'users_danhhieu_doituong.id_danhhieu_doituong')
            ->where('danhhieu_doituong.id_danhhieu', '=', $id_title)
            ->where('danhhieu_doituong.id_doituong', '=', $id_object)
            ->where('users_danhhieu_doituong.confirmed', '=', 1)
            ->selectRaw('users.*')
            ->get();

        $params = [
            'user' => $user,
            'id_title' => $id_title,
            'id_object' => $id_object,
            'tieuchis' => $tieuchis,
            'list_user' => $list_user,
            'count_tieuchuan' => $count_tieuchuan,
        ];
        return view('manager.print-report', $params);
    }

    public function printPhieuThamDinh(Request $request) {
        $request->validate([
            'id_user' => ['required', 'string', 'exists:users,id'],
            'id_danhhieu_doituong' => ['required', 'string', 'exists:danhhieu_doituong,id']
        ]);
        $ProfileController = new ProfileController;

        $id_danhhieu_doituong = $request->input('id_danhhieu_doituong');
        $id_user = $request->input('id_user');

        $danhhieu_doituong = DB::table('danhhieu_doituong')
            ->join('danhhieu', 'danhhieu.id', '=', 'danhhieu_doituong.id_danhhieu')
            ->where('danhhieu_doituong.id', '=', $id_danhhieu_doituong)
            ->first();

        $id_title = $danhhieu_doituong->id_danhhieu;
        $id_object = $danhhieu_doituong->id_doituong;

        $user = DB::table('users')->find($id_user);
        $user_danhhieu_doituong = DB::table('users_danhhieu_doituong')
            ->where('id_danhhieu_doituong', '=', $id_danhhieu_doituong)
            ->where('id_users', '=', $id_user)
            ->join('users as rank', 'id_user_ranked', '=', 'rank.id')
            ->first();

        $name_unit = DB::table('unit')->find($user->id_unit)->name;

        $params = [
            'tieuchis' => $ProfileController->getTieuChuanTieuChi($id_title, $id_object),
            'user' => $user,
            'user_danhhieu_doituong' => $user_danhhieu_doituong,
            'danhhieu_doituong' => $danhhieu_doituong,
            'name_unit' => $name_unit,
        ];
        return view('manager.print-phieu-tham-dinh', $params);
    }
}
