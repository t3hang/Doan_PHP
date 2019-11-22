<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;
class CauHoiAPI extends Controller
{
    public function DScauhoi($id)
{
	$dsCauhoi=LinhVuc::find($id)->dsCauhoi;
	return response()->json($dsCauhoi);
}
}
