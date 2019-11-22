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
	Route::get('/{id}','LinhVucAPI@DScauhoiTheoLinhVuc');
	});
	Route::prefix('nguoi-choi')->group(function(){
	Route::get('/','NguoiChoiAPI@layDanhSach');
	//Route::get('/{id}','LinhVucAPI@DScauhoiTheoLinhVuc');
	});
	Route::prefix('cau-hoi')->group(function(){
	Route::get('/{id}','CauHoiAPI@DScauhoi');
});
});