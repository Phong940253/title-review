<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamp = false;
    public function permissions() {
        return $this->belongsToMany('App\model\permistion');
    }
    use HasFactory;
}
