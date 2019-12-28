<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CauHoi;
use App\LinhVuc;
class CauHoiAPI extends Controller
{
//  public function cauHoiTheoLinhVuc(Request $request)
//     {
//         $linhVuc = $request->query('linh_vuc');
//         $cauhoi = CauHoi::where('linh_vuc_id', $linhVuc)->get();
//         if (count($cauhoi) === 0)
//         {
//             $res = [
//                 'success'   => false,
//                 'msg'       => 'Không tìm thấy câu hỏi tương ứng'
//             ];
//             return response()->json($res);
//         }
//         $res = [
//             'success'   => true,
//             'msg'       => 'Tải câu hỏi thành công',
//             'data'      => $cauhoi
//         ];
//         return response()->json($res);      

// }
//         public function DScauhoi($id)
// {
//     $dsCauhoi=LinhVuc::find($id)->dsCauhoi;
//     return response()->json($dsCauhoi);
// }
    public function cauHoiTheoLinhVuc($id)
    {
        $cauhois=CauHoi::where('linh_vuc_id',$id)->get();
        if (count($cauhois) === 0)
        {
            $res = [
                'success'   => false,
                'msg'       => 'Không tìm thấy câu hỏi tương ứng'
            ];
            return response()->json($res);
        }

        $res = [
            'success'   => true,
            'msg'       => 'Tải câu hỏi thành công',
            'data'      => $cauhois
        ];
        return response()->json($res);
    }
}
