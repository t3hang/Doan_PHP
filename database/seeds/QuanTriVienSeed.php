<?php

use Illuminate\Database\Seeder;
use App\QuanTriVien;
class QuanTriVienSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuanTriVien::create([
        	"ten_dang_nhap" => 'Giau',
        	"ho_ten"       	=> 'Giaukun',
        	"mat_khau"		=> Hash::make('123456')
        ]);
      QuanTriVien::create([
            "ten_dang_nhap" => 'Giaukun',
            "ho_ten"        => 'Giau',
            "mat_khau"      => Hash::make('123456')
        ]);
       QuanTriVien::create([
            "ten_dang_nhap" => 'Hai',
            "ho_ten"        => 'PhanMinhHai',
            "mat_khau"      => Hash::make('123456')
        ]);
        QuanTriVien::create([
            "ten_dang_nhap" => 'Hang',
            "ho_ten"        => 'TranThiThanhHang',
            "mat_khau"      => Hash::make('123456')
        ]);
         QuanTriVien::create([
            "ten_dang_nhap" => 'Huy',
            "ho_ten"        => 'TranVoMinhHuy',
            "mat_khau"      => Hash::make('123456')
        ]);
      
	}

}
