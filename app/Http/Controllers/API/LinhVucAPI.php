<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;
class LinhVucAPI extends Controller
{
	public function DSLinhVuc()
{
	$dsLinhVuc = LinhVuc::select('id','ten_linh_vuc')->get()->random(4)dsLinhVuc;
	$kq=[
		'success'=> true,
		'data'=> $dsLinhVuc
	];
	return response()->json($kq,200);
}
}
