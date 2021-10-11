<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhHieuDoiTuong extends Model
{
    use HasFactory;

    protected $table = 'danhhieu_doituong';

    protected $fillable = [
        'id_danhhieu',
        'id_doituong',
    ];

    protected $appends = ['id_danhhieu_doituong'];

    public function getIdDanhhieuDoituongAttribute(){

        return $this->attributes['id'];

    }
}
