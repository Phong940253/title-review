<?php

namespace App\Exports;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TieuchuanController;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 *
 */
class RecordUsers implements FromCollection, WithHeadings
{
    public $id_title, $id_object, $id_unit, $heading, $selecting, $base, $id_danhhieu_doituong;

    function __construct($id_title, $id_object, $id_unit) {
        $this->id_title = $id_title;
        $this->id_object = $id_object;
        $this->id_unit = $id_unit;
        $ProfileController = new ProfileController();
        $TieuchuanController = new TieuchuanController();
        $tieuchis = $ProfileController->getTieuChuanTieuChi($this->id_title, $this->id_object);
        $this->id_danhhieu_doituong = $TieuchuanController->getIdDanhHieuDoiTuong($this->id_title, $this->id_object);

        $this->base = "users.ms, users.name, users.telephone, users.email, unit.name, users_danhhieu_doituong.confirmed, approve.name, users_danhhieu_doituong.rank, rank.name, users_danhhieu_doituong.comment, users_danhhieu_doituong.comment_special";
        $this->selecting = "users.ms as user_ms, users.name as user_name, users.telephone as user_telephone, users.email as user_email, unit.name as unit_name, users_danhhieu_doituong.confirmed, approve.name as approved_name, users_danhhieu_doituong.rank, rank.name as ranked_name, users_danhhieu_doituong.comment as comment_all, users_danhhieu_doituong.comment_special as comment_special_all";

        $this->heading = [
            'MS',
            'Họ và tên',
            'Số điện thoại',
            'Email',
            'Đơn vị',
            'Xét duyệt',
            'Người duyệt cấp khoa',
            'Xếp loại',
            'Người duyệt cấp trường',
            'Ghi chú',
            'Ghi chú điểm đặc biệt'
        ];

        foreach ($tieuchis as $tieuchi) {
            if (count($tieuchi->tieuchuans) <= 0) {
                $tieuchi->noidungs = $TieuchuanController->getNoidung($tieuchi->id, NULL);
                foreach ($tieuchi->noidungs as $noidung) {
//                    $new_noidung = array($noidung->id => $new_content);
                    $this->selecting .= ", MAX(CASE WHEN replies.id_noidung = {$noidung->id} THEN replies.evaluate ELSE NULL END) AS '{$noidung->id}'";
                    array_push($this->heading, $tieuchi->name . ' - '. $noidung->content);
                }
            }
            foreach ($tieuchi->tieuchuans as $tieuchuan) {
                $tieuchuan->noidungs = $TieuchuanController->getNoidung($tieuchi->id, $tieuchuan->id);
                foreach ($tieuchuan->noidungs as $noidung) {
//                    $new_noidung = array($noidung->id => $new_content);
                    $this->selecting .= ", MAX(CASE WHEN replies.id_noidung = {$noidung->id} THEN replies.evaluate ELSE NULL END) AS '{$noidung->id}'";
                    array_push($this->heading, $tieuchi->name . ' - ' . $tieuchuan->name . ' - '. $noidung->content);
                }
            }
        }
    }

    /**
    * @return Collection
    */
    public function collection(): Collection
    {

//        Log::debug($selecting);
        $table = DB::table('users')
            ->leftJoin('replies', 'users.id', '=', 'replies.id_users')
            ->join('unit', 'users.id_unit', '=', 'unit.id');

        if ($this->id_unit)
            $table = $table->where('users.id_unit', '=', $this->id_unit);
        $table = $table
            ->leftJoin('noidung', 'noidung.id', '=', 'replies.id_noidung')
            ->join('users_danhhieu_doituong', 'users_danhhieu_doituong.id_users', '=', 'users.id')
            ->leftJoin('users as approve', 'approve.id', '=', 'users_danhhieu_doituong.id_approved')
            ->leftJoin('users as rank', 'rank.id', '=', 'users_danhhieu_doituong.id_user_ranked')
            ->where('users_danhhieu_doituong.id_danhhieu_doituong', '=', $this->id_danhhieu_doituong->id)
            ->groupByRaw($this->base)
            ->selectRaw($this->selecting)
            ->get();
//        Log::debug($table);
//        Log::debug($this->heading);
        return $table;
    }

    public function headings(): array
    {
        return $this->heading;
    }
}
