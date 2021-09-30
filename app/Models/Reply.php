<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $primaryKey = array('id_noidung', 'id_users');

    protected $fillable = [
        'id_users',
        'id_noidung',
        'reply'
    ];

    public $incrementing = false;

    protected function setKeysForSaveQuery($query): Builder
    {
        return $query
            ->where('id_noidung', $this->getAttribute('id_noidung'))
            ->where('id_users', $this->getAttribute('id_users'));
    }
}
