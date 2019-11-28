<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('API')->group(function()
{
	Route::prefix('linh-vuc')->group(function(){
	Route::get('/','LinhVucAPI@DSLinhVuc');
	});
	Route::prefix('goi-credit')->group(function() {
			Route::get('/', 'GoiCreditAPI@DSGoiCredit');
			Route::get('/{id}', 'GoiCreditAPI@ChiTietGoiCredit');
		});
	Route::prefix('nguoi-choi')->group(function() {
			Route::get('/', 'NguoiChoiAPI@xepHang');
			Route::get('/{id}', 'NguoiChoiAPI@ChiTietNguoiChoi');		
		});
	Route::prefix('cau-hoi')->group(function(){
	Route::get('/{id}','CauHoiAPI@DScauhoi');
});
});