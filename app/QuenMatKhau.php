<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuenMatKhau extends Model
{
    protected $table = "quen_mat_khau";

    protected $fillable = [
    	'email',
    	'ma_xac_nhan',
    	'han_su_dung'
    ];
}
