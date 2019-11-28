<?php


// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |

route::middleware("auth")->group(function(){
Route::prefix('linh-vuc')->group(function()
{
	Route::name("linh-vuc.")->group(function() {
		Route::get("/", "LinhVucController@index")->name('index');
		Route::get('/them-moi','LinhVucController@create')->name('create');
		Route::post('/them-moi','LinhVucController@store')->name('store');
		Route::get('/sua-linh-vuc/{id}', 'LinhVucController@edit')->name('edit');
		Route::put("/sua-linh-vuc", "LinhVucController@update")->name('update');
		Route::delete('/xoa-linh-vuc/{id}', 'LinhVucController@destroy')->name('remove');
		Route::get('/ds-da-xoa', 'LinhVucController@trashList')->name('trash');
		Route::post('/khoi-phuc/', 'LinhVucController@restore')->name('restore');
});
});
Route::prefix('cau-hoi')->group(function()
{
	Route::name("cau-hoi.")->group(function() {
		Route::get("/", "CauHoiController@index")->name('index');
		Route::get('/them-moi','CauHoiController@create')->name('create');
		Route::post('/them-moi','CauHoiController@store')->name('store');
		Route::get('/sua-cau-hoi/{id}', 'CauHoiController@edit')->name('edit');
		Route::put("/sua-cau-hoi", "CauHoiController@update")->name('update');
		Route::delete('/xoa-cau-hoi/{id}', 'CauHoiController@destroy')->name('remove');
		Route::get('/ds-xoa', 'CauHoiController@trashList')->name('trash');
		Route::post('/khoi-phuc/{id}', 'CauHoiController@restore')->name('restore');

});
});
Route::prefix('nguoi-choi')->group(function()
{
	Route::name("nguoi-choi.")->group(function() {
		Route::get("/", "NguoiChoiController@index")->name('index');
		Route::get('/them-moi','NguoiChoiController@create')->name('create');
		Route::post('/them-moi','NguoiChoiController@store')->name('store');
		Route::get('/sua-nguoi-choi/{id}', 'NguoiChoiController@edit')->name('edit');
		Route::put("/sua-nguoi-choi", "NguoiChoiController@update")->name('update');
		Route::delete('/xoa-nguoi-choi/{id}', 'NguoiChoiController@destroy')->name('remove');
		Route::get('/ds-xoa', 'NguoiChoiController@trashList')->name('trash');
		Route::post('/khoi-phuc/', 'NguoiChoiController@restore')->name('restore');

});
});

Route::prefix('goi-credit')->group(function()
{
	Route::name("goi-credit.")->group(function() {
		Route::get("/", "GoicreditController@index")->name('index');
		Route::get('/them-moi','GoicreditController@create')->name('create');
		Route::post('/them-moi','GoicreditController@store')->name('store');
		Route::get('/sua-goi-credit/{id}', 'GoicreditController@edit')->name('edit');
		Route::put("/sua-goi-credit", "GoicreditController@update")->name('update');
		Route::delete('/xoa-goi-credit/{id}', 'GoicreditController@destroy')->name('remove');
		Route::get('/ds-da-xoa', 'GoicreditController@trashList')->name('trash');
		Route::post('/khoi-phuc/', 'GoicreditController@restore')->name('restore');

});
});

Route::prefix('lich-su-credit')->group(function()
{
	Route::name("lich-su-credit.")->group(function() {
		Route::get("/", "LichSuaMuacreditController@index")->name('index');
		Route::get('/them-moi','LichSuaMuacreditController@create')->name('create');
		Route::post('/them-moi','LichSuaMuacreditController@store')->name('store');
		Route::get('/sua-goi-credit/{id}', 'LichSuaMuacreditController@edit')->name('edit');
		Route::put("/sua-goi-credit", "LichSuaMuacreditController@update")->name('update');
		Route::delete('/xoa-goi-credit/{id}', 'LichSuaMuacreditController@destroy')->name('remove');
		Route::get('/ds-da-xoa', 'LichSuaMuacreditController@trashList')->name('trash');
		Route::post('/khoi-phuc/', 'LichSuaMuacreditController@restore')->name('restore');

});
});
});


Route::get("dang-nhap","QuanTriVienController@getlogin")->name("get-login")->middleware("guest");
Route::post("/","QuanTriVienController@postlogin")->name("post-login");
Route::get("dang-xuat","QuanTriVienController@logout")->name("logout");




