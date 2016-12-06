<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinh_vien extends Model
{
    protected $table = 'sinh_vien';
    protected $fillable = ['id','ctdt',
    'khoa_hoc',
    'id_khoa',
    'id_de_tai',
    'nop_ho_so',
    'tt_dang_ky',	
    ];

    public $timestamps = false;
}
