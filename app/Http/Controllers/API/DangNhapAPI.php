<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiChoi;
use App\QuenMatKhau;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendMailJob;
use Carbon\Carbon;

class DangNhapAPI extends Controller
{
    //
    public function dangNhap(Request $request)
    {
        $credentials = $request->only('ten_dang_nhap', 'password');
        $token = auth('api')->attempt($credentials);
        if (!$token)
        {
            $res = [
                'success'   => false,
                'msg'       => 'Đăng nhập thất bại, mời thử lại'
            ];
            return \response()->json($res);
        }
        $res = [
            'success'   => true,
            'msg'       => 'Đăng nhập thành công',
            'token'     => $token,
            'type'      => 'Bearer', // you can ommit this
            'expires'   => auth('api')->factory()->getTTL() * 60 * 24 * 7
        ];
        return \response()->json($res);
    }
    public function LayThongTin()
    {
        return auth('api')->user();
    }
    public function dangXuat()
    {
        auth('api')->logout();
        $res = [
            'success'   => true,
            'msg'       => 'Đăng xuất thành công'
        ];
        return \response()->json($res);
    }
    public function dangKy (Request $request)
    {
            $nguoiChoi = [
                'ten_dang_nhap' => $request->ten_dang_nhap,
                'email'         => $request->email,
                'mat_khau'      => \Hash::make($request->password),
                'diem_cao_nhat' => 0,
                'credit'        => 0,
                'hinh_dai_dien' => ''
            ];
            $kq = NguoiChoi::create($nguoiChoi);
            if(!$kq)
            {
                 $res = [
                    'success'   => false,
                    'msgg'       => 'Đăng ký thất bại, mời thử lại'
                ];
                return \response()->json($res);
            }
            $credentials = $request->only('ten_dang_nhap', 'password');
            $token = auth('api')->attempt($credentials);
            $user = auth('api')->user();
            $res = [
            'success'   => true,
            'msgg'      => 'Đăng ký thành công',
            'user'      => $user,
            'token'     => $token,
            'type'      => 'Bearer', // you can ommit this
            'expires'   => auth('api')->factory()->getTTL() * 60 * 24 * 7
            ];
            return \response()->json($res);
    }

    public function quenMatKhau(Request $req)
    {
        SendMailJob::dispatch($req->email);

        $res = [
           'success' => true,
           'msg'     => 'Vui long vao email lay ma xac nhan'
        ];
        return response()->json($res);
    }

    public function lamMoiMatKhau(Request $req)
    {
        $date = Carbon::now();
        $ketQua = QuenMatKhau::where('email', $req->email)
                            ->where('ma_xac_nhan', $req->ma_xac_nhan)
                            ->first();
        if ($ketQua == null) {
            $res = [
               'success' => false,
               'msg'     => 'Có lỗi xảy ra, vui lòng thử lại'
            ];
            return response()->json($res);
        }
        $hanSuDung = $ketQua->han_su_dung; 
        // dd($ketQua);
        if($date->lte($hanSuDung))
        {
            $a = NguoiChoi::where('email', $req->email)->update(['mat_khau'  => Hash::make($req->mat_khau)]);
            return response()->json(['success'  => true ]);
        }
        $res = [
           'success' => false,
           'msg'     => 'Mã xác nhận sai hoặc hết hạn, vui lòng thử lại'
        ];
        return response()->json($res);
        
        
    }

}
