<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChiTietLuotChoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Chi_Tiet_Luot_Choi', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('luot_choi_id');
            $table->Integer('cau_hoi_id');
            $table->String('phuong_an');
            $table->Integer('diem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Chi_Tiet_Luot_Choi');
    }
}
