<?php

use Illuminate\Database\Seeder;

class NguoiChoiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\NguoiChoi::create([

        	'ten_dang_nhap'		=> 'giau',
        	'email'				=> 'giau',
        	'mat_khau'			=> Hash::make('123456'),
        	'hinh_dai_dien'		=> '',
        	'diem_cao_nhat'		=> 123,
        	'credit'			=> 123

        ]);
        App\NguoiChoi::create([

            'ten_dang_nhap'     => 'huy',
            'email'             => 'huy',
            'mat_khau'          => Hash::make('123456'),
            'hinh_dai_dien'     => '',
            'diem_cao_nhat'     => 12345,
            'credit'            => 12345

        ]);
    }
}
