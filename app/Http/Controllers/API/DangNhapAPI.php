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
use Validator;

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
        $valid = Validator::make(
            $req->all(),
            [
                'email' => 'required|email:rfc|exists:nguoi_choi,email'
            ],
            [
                'email.required'    => 'Email không để trống',
                'email.email'       => 'Không đúng định dạng email',
                'email.exists'      => 'Email không tồn tại',
            ]
        );

        if (!$valid->passes()) {
            return \response()->json(['success' => false, 'msg' => $valid->errors()->first()]);
        }

        SendMailJob::dispatch($req->email);

        $res = [
           'success' => true,
           'msg'     => 'Vui long vao email lay ma xac nhan'
        ];
        return response()->json($res);
    }

    public function lamMoiMatKhau(Request $req)
    {

        $valid = Validator::make(
            $req->all(),
            [
                'email'         => 'required|email:rfc|exists:nguoi_choi,email',
                'ma_xac_nhan'   => 'required',
                'mat_khau'      => 'required|min:6|max:30',
            ],
            [
                'email.required'        => 'Email không để trống',
                'email.email'           => 'Không đúng định dạng email',
                'email.exists'          => 'Email không tồn tại',
                'ma_xac_nhan.required'  => 'Mã xác nhận không để trống',
                'mat_khau.required'     => 'Mật khẩu không để trống',
                'mat_khau.min'          => 'Mật khẩu tối thiểu 6 ký tự',
                'mat_khau.max'          => 'Mật khẩu tối đa 30 ký tự'
            ]
        );

        if (!$valid->passes()) {
            return \response()->json(['success' => false, 'msg' => $valid->errors()->first()]);
        }

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
        $date = Carbon::now();
        if($date->lte($hanSuDung))
        {
            NguoiChoi::where('email', $req->email)->update(['mat_khau'  => Hash::make($req->mat_khau)]);
            $ketQua->forceDelete();
            $res = [
               'success' => true,
               'msg'     => 'Đổi mật khẩu thành công'
            ];
            return response()->json($res);
        } else {
            $res = [
               'success' => false,
               'msg'     => 'Mã xác nhận sai hoặc hết hạn, vui lòng thử lại'
            ];
            return response()->json($res);   
        }
        
        
    }

}
