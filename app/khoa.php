<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    protected $table = 'khoa';
    protected $fillable = ['ten',
    'so_luong_sinh_sv',
    'mo_dang_ky',
    'id_de_tai'
    ];

    protected $hidden = ['admin_id',
    ];

    public $timestamps = true;
}
