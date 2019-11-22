<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CauHinhTroGiup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cau_Hinh_Tro_Giup', function (Blueprint $table) {
            $table->increments('id');
             $table->Integer('loai_thu_tu');
            $table->Integer('thu_tu');
             $table->Integer('credit');
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
        Schema::dropIfExists('Cau_Hinh_Tro_Giup');
    }
}
