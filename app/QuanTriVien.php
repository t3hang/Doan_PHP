<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class QuanTriVien extends Authenticatable
{
	use SoftDeletes;
	protected $table="quan_tri_vien";
	protected $filltable=["ten_dang_nhap","ho_ten","mat_khau"];
    //
    protected $hidden=["mat_khau"];
    public function getAuthPassword()
    {
    	return $this->mat_khau;
    }
}
