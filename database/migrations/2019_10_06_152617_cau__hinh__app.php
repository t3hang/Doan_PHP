<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CauHinhApp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cau_Hinh_app', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('co_hoi_sai');
            $table->Integer('thoi_gian_tra_loi');
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
        Schema::dropIfExists('Cau_Hinh_app');
    }
}
