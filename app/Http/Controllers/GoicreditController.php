<?php

namespace App\Http\Controllers;

use App\GoiCredit;
use Illuminate\Http\Request;

class GoicreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
        $dsGoiCredit = GoiCredit::all();
        return view('GoiCredit.index-goicredit', compact('dsGoiCredit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // return view('GoiCredit.index-goicredit');
        return view('GoiCredit.create-goicredit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
         $credit= new GoiCredit;
        $credit->Ten_goi= $request->Ten_goi;
         $credit->Credit= $request->Credit;
         $credit->So_tien= $request->So_tien;
         $credit->save();
         return back()->with('msg', 'Thêm gói credit thành công');
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

           $dsGoiCredit = GoiCredit::findOrFail($id);
           
            return view('GoiCredit.update', compact('dsGoiCredit'));
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

            $goiCredit = GoiCredit::findOrFail($request->id);
            $goiCredit->Ten_goi = $request->Ten_goi;
            $goiCredit->Credit = $request->Credit;
            $goiCredit->So_tien = $request->So_tien;
            $kq = $goiCredit->save();
            if ($kq) {
            
                return redirect()
                        ->route('goi-credit.index')
                        ->with('msg',"Cập nhật gói credit thành công");
             }
            return back()
                    ->withErrors('Cập nhật gói credit thất bại')
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
            $goiCredit = GoiCredit::findOrFail($id);
            $kq = $goiCredit->delete();
            if ($kq) {
                return back()->with('msg', 'Xoá gói credit thành công');
            }
            return back()->withErrors('Xoá gói credit thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

      public function trashList()
        {
            $db = GoiCredit::onlyTrashed()->get();
            return view('goiCredit.trash', compact('db'));
        }

      public function restore(Request $request)
    {
        try {
            $id = $request->id;
            $kq = GoiCredit::onlyTrashed()
                    ->findOrFail($id)
                    ->restore();
            if ($kq) {
                return back()->with('msg', 'Khôi phục gói credit thành công');
            }
            return back()->withErrors('Khôi phục gói credit thất bại');
        } catch (Exception $ex) {
            return back()->withErrors('Có lỗi xãy ra, mời thử lại sau');
        }
    }
}
