<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHoi extends Model
{
    use SoftDeletes;
     protected $table = 'Cau_Hoi';
     protected $filltable = ['id','noi_dung','linh_vuc_id','phuong_an_A','phuong_an_B','phuong_an_C','phuong_an_D','dap_an'];

     public function luotChoi()
    {
        return $this->belongsToMany('App\LuotChoi', 'chi_tiet_luot_choi');
    }

    public function linhVuc()
    {
    	return $this->belongsTo('App\LinhVuc');
        
    }
}
