<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LuotChoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Luot_Choi', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('Nguoi_choi_id')->unsigned();
            $table->integer('So_Cau');
            $table->string('Dem');
            $table->string('Ngay_gio');
             $table->foreign('Nguoi_choi_id')->references('id')->on('Nguoi_Choi')->onDelete('cascade');
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
        Schema::dropIfExists('Luot_Choi');
    }
}
