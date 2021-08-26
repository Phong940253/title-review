<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTieuchiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tieuchi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_danhhieu');
            $table->string('name');
            $table->timestamps();
            $table->foreign('id_danhhieu')->references('id')->on('danhhieu')
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
        Schema::dropIfExists('tieuchi');
    }
}
