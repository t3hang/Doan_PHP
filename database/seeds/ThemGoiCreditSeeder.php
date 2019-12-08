<?php

use Illuminate\Database\Seeder;
use App\GoiCredit;

class ThemGoiCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GoiCredit::create(['ten_goi'=> '500 ruby = 20.000Đ', 'credit'=>'500', 'so_tien'=>'20.000']);
        GoiCredit::create(['ten_goi'=> '1000 ruby = 40.000Đ', 'credit'=>'1000', 'so_tien'=>'40.000']);
        GoiCredit::create(['ten_goi'=> '1500 ruby = 50.000Đ', 'credit'=>'1500', 'so_tien'=>'50.000']);
        GoiCredit::create(['ten_goi'=> '2000 ruby = 60.000Đ', 'credit'=>'2000', 'so_tien'=>'60.000']);
    }
}
