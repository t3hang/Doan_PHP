<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\LinhVuc;
use App\CauHoi;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\LinhVucRq;
class LinhVucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $dsLinhVuc = LinhVuc::all();
        return view('LinhVuc.index',compact('dsLinhVuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('LinhVuc.them-moi-linh-vuc');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinhVucRq $request)
    {
        try{
        $LinhVuc= new LinhVuc;
        $LinhVuc->ten_linh_vuc = $request->ten_linh_vuc;
        $LinhVuc->save();
         return back()->with('msg', 'Thêm lĩnh vực thành công');
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
        //
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
        try{

           $linhvuc = LinhVuc::findOrFail($id);
           
            return view('linhVuc.update', compact('linhvuc'));
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
        // $dsLinhVuc = LinhVuc::all();
        // return view('LinhVuc.index',compact('dsLinhVuc'));
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
       
          try {

            $linhvuc = LinhVuc::findOrFail($request->id);
            $linhvuc->ten_linh_vuc = $request->ten_linh_vuc;
            $kq = $linhvuc->save();
            if ($kq) {
                return redirect()
                        ->route('linh-vuc.index')
                        ->with('msg',"Cập nhật lĩnh vực thành công");
             }
            return back()
                    ->withErrors('Cập nhật lĩnh vực thất bại')
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
    public function destroy($id) //xóa
    {
         try {
            $linhvuc = LinhVuc::findOrFail($id);
            $xoaDSCauHoi = CauHoi::where('linh_vuc_id', $id)->delete();
            $xoaLinhVuc = $linhvuc->delete();
            if ($xoaLinhVuc) {
                return back()->with('msg', "Xoá lĩnh vực thành công");
            }
            return back()->withErrors('Xoá lĩnh vực thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }
    public function trashList() //danh sách xóa
    {
        $db = LinhVuc::onlyTrashed()->get();
        return view('LinhVuc.trash', compact('db'));
    }
        public function restore(Request $request) //khôi phục
    {
       try {
            $id = $request->id;
            $linhvuc = LinhVuc::onlyTrashed()->findOrFail($id);
            $khoiPhucDSCauHoi = CauHoi::onlyTrashed()->where('deleted_at', $linhvuc->deleted_at)->restore();
            $khoiPhucLinhVuc = $linhvuc->restore();
            if ($khoiPhucLinhVuc && $khoiPhucDSCauHoi) {
                return back()->with('msg', 'Khôi phục lĩnh vực thành công');
            }
            return back()->withErrors('Khôi phục lĩnh vực thất bại');
        } catch (Exception $ex) {
            return back()->withErrors('Có lỗi xãy ra, mời thử lại sau');
        }
    }
}
