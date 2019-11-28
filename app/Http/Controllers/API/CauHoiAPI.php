<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CauHoi;
use App\LinhVuc;
class CauHoiAPI extends Controller
{
 public function cauHoiTheoLinhVuc(Request $request)
    {
        $linhVuc = $request->query('linh_vuc');
        $cauhoi = CauHoi::
                        where('linh_vuc_id', $linhVuc)
                            ->get();
        if (count($cauhoi))
        {
            $res = [
                'success' => true,
                'msg'     => 'Load câu hỏi thành công',
                'data'    => $cauhoi->random(1)->first()
            ];
            return \response()->json($res);
        }

        $res = [
            'success'   => false,
            'msg'       => 'Load câu hỏi thất bại'
        ];
        return \response()->json($res, 400);
        

            

}
//         public function DScauhoi($id)
// {
//     $dsCauhoi=LinhVuc::find($id)->dsCauhoi;
//     return response()->json($dsCauhoi);
// }
}
