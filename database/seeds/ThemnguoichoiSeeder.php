<?php

use Illuminate\Database\Seeder;
use App\QuanTriVien;

class ThemnguoichoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          $count = 1;
        while($count < 10) {
			echo "Them nguoi choi thu " . $count . "\n";
        	$tenDangNhap = str_random(10);
        	App\NguoiChoi::create([
        		'ten_dang_nhap' => $tenDangNhap,
        		'mat_khau'		=> Hash::make(str_random(10)),
        		'email'			=> $tenDangNhap . '@gmail.com',
        		'hinh_dai_dien'	=> $tenDangNhap . '.jpg',
        		'diem_cao_nhat'	=> rand(1000, 5000),
        		'credit'		=> rand(10, 500)
        	]);
        	$count++;
        }
    }
}
