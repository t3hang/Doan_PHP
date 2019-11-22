<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class QuanTriVienController extends Controller
{
    public function getlogin()
    {
    	return view("DangNhap/login");
    }
    public function postlogin(Request $request)
    {
    	$cen= $request->only("ten_dang_nhap","password");
    	if (Auth::attempt($cen))
    	{
    		return redirect()->route('linh-vuc.index');
    	}
    	else 
    	{
    		return back();
    	}
    }
    public function logout()
    {
    	Auth::logout();
    	return \redirect()->route('get-login');
    }	
}
