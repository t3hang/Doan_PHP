<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CauHoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cau_Hoi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noi_dung');
            $table->Integer('linh_vuc_id')->unsigned();
             $table->string('phuong_an_A');
             $table->string('phuong_an_B');
             $table->string('phuong_an_C');
             $table->string('phuong_an_D');
             $table->string('dap_an');
             $table->softDeletes();
              $table->foreign('linh_vuc_id')->references('id')->on('Linh_Vuc')->onDelete('cascade');
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
        Schema::dropIfExists('Cau_Hoi');
    }
}
