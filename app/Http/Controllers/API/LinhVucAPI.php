<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;
class LinhVucAPI extends Controller
{
// 	public function DSLinhVuc()
// {
// 	$dsLinhVuc = LinhVuc::select('id','ten_linh_vuc')->get()->random(4);
// 	$kq=[
// 		'success'=> true,
// 		'data'=> $dsLinhVuc
// 	];
// 	return response()->json($kq,200);
// }
	public function DSLinhVuc()
    {
        $count = LinhVuc::count();
        if ($count >= 4)
        {
            $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc')->get()->random(4);
        }
        else
        {
            $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc')->get()->random($count);
        }
        $res = [
            'success'   => true,
            'data'      => $dsLinhVuc,
            'msg'       => 'Load lĩnh vực thành công'
        ];
        return response()->json($res);
    }
}
