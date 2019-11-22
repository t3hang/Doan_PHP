<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
class LinhVuc extends Model

{
	use SoftDeletes;
    protected $table = 'Linh_Vuc';
    protected $filltable = ['id','ten_linh_vuc'];
    public function dsCauHoi()
	{
		return $this->hasMany('App\CauHoi');
	}
}
