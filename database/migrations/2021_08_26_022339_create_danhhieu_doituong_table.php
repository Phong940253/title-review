<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhhieuDoituongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhhieu_doituong', function (Blueprint $table) {
            $table->unsignedInteger('id_danhhieu');
            $table->unsignedInteger('id_doituong');
            $table->increments('id');
            $table->timestamps();

            $table->foreign('id_danhhieu')->references('id')->on('danhhieu')
                ->onDelete('cascade');
            $table->foreign('id_doituong')->references('id')->on('doituong')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhhieu_doituong');
    }
}
