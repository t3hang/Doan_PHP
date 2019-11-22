<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use App\LinhVuc;

class CauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dscauhoi = CauHoi::all();
         return view('CauHoi.form-ds-cau-hoi',compact('dscauhoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsLinhVuc = LinhVuc::all();
         return view('CauHoi.form-them-cau-hoi',compact('dsLinhVuc'));
    // return view ('CauHoi.form-them-cau-hoi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
        $CauHoi= new CauHoi();
        $CauHoi->noi_dung= $request->noi_dung;
        $CauHoi->linh_vuc_id=$request->linh_vuc_id;
        $CauHoi->phuong_an_A=$request->phuong_an_A;
        $CauHoi->phuong_an_B=$request->phuong_an_B;
        $CauHoi->phuong_an_C=$request->phuong_an_C;
        $CauHoi->phuong_an_D=$request->phuong_an_D;
        $CauHoi->dap_an=$request->dap_an;
        $CauHoi->save();
         return back()->with('msg', 'Thêm câu hỏi thành công');
        } catch (Exception $e)
        {
         return back()
                    ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                    ->withInput();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
           try {
            $cauhoi = CauHoi::findOrFail($id);
            $dsLinhVuc = LinhVuc::all();
            return view('CauHoi.update', compact('cauhoi', 'dsLinhVuc'));
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        try {
        $CauHoi = CauHoi::findOrFail($request->id);
        $CauHoi->noi_dung= $request->noi_dung;
        $CauHoi->linh_vuc_id=$request->linh_vuc_id;
        $CauHoi->phuong_an_A=$request->phuong_an_A;
        $CauHoi->phuong_an_B=$request->phuong_an_B;
        $CauHoi->phuong_an_C=$request->phuong_an_C;
        $CauHoi->phuong_an_D=$request->phuong_an_D;
        $CauHoi->dap_an=$request->dap_an;
       $kq= $CauHoi->save();

            if ($kq) {
                return redirect()
                        ->route('cau-hoi.index')
                        ->with('msg', 'Cập nhật câu hỏi thành công');
            }
            return back()
                    ->withErrors('Cập nhật câu hỏi thất bại')
                    ->withInput();
        } catch (Exception $e) {
            return back()
                    ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                    ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    try {
            $kq = CauHoi::findOrFail($id)->delete();
            if ($kq) {
                return back()->with('msg', 'Xoá câu hỏi thành công');
            }
            return back()->withErrors('Xoá câu hỏi thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

        public function trashList()
            {
                $db = CauHoi::onlyTrashed()->get();
                return view('CauHoi.trashh', compact('db'));
            }


     public function restore($id)
    {
        try {
            $cauHoi = CauHoi::onlyTrashed()->findOrFail($id);
            $cauHoi->restore();
            $linhVuc = LinhVuc::withTrashed()->findOrFail($cauHoi->linh_vuc_id)->restore();
            if ($cauHoi && $linhVuc) {
                return back()->with('msg', 'Khôi phục câu hỏi thành công');
            }
            return back()->withErrors('Khôi phục câu hỏi thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

}
