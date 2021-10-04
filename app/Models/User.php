<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ms',
        'name',
        'email',
        'password',
        'id_unit',
        'telephone',
        'birthDay',
        'gender',
        'nation',
        'date_admission_doan',
        'date_admission_dang_reserve',
        'date_admission_dang_official',
        'current_position',
        'highest_position',
        'year',
        'url_image',
        'id_province',
        'id_district',
        'id_ward',
        'street',
        'id_current_province',
        'input_current_district',
        'input_current_ward',
        'current_street',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
