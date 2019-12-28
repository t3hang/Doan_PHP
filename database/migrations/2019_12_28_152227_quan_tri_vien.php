<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanTriVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quan_tri_vien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('ten_dang_nhap');
            $table->string('mat_khau');
            $table->string('ho_ten');
            $table->rememberToken();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quan_tri_vien');
    }
}
