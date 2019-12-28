<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LuotChoi;
class LuotChoiAPI extends Controller
{
    public function luuLuotChoi (Request $request)
	{
		$luotChoi = [
                'Nguoi_choi_id'  => $request->Nguoi_choi_id,
                'So_Cau'         => $request->So_Cau,
                'Dem'     		 => $request->Dem
            ];
        $kq = LuotChoi::create($luotChoi);
        if(!$kq)
        {
        	$res = [
        		'success'	=> false,
        		'msgg'		=> 'Lưu lượt chơi thất bại'
        	];
        	return response()->json($res);
        }
        $res = [
        		'success'	=> true,
        		'msg'		=> 'Lưu lượt chơi thành công'
        	];
        	return response()->json($res);
	}
}
