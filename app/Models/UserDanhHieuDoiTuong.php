<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class UserDanhHieuDoiTuong extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'users_danhhieu_doituong';

    protected $primaryKey = array('id_danhhieu_doituong', 'id_users');

    /**
     * @var string[]
     */
    protected $fillable = [
        'id_danhhieu_doituong',
        'id_users',
        'confirmed',
        'comment',
        'edit',
    ];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @param Builder $query
     * @return Builder
     */
    protected function setKeysForSaveQuery($query): Builder
    {
        return $query
            ->where('id_danhhieu_doituong ', $this->getAttribute('id_danhhieu_doituong '))
            ->where('id_users', $this->getAttribute('id_users'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
