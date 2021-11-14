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
            $table->unsignedInteger('id_danhhieu_doituong');
            $table->string('name');
            $table->timestamps();
            $table->foreign('id_danhhieu_doituong')->references('id')->on('danhhieu_doituong')
                ->onDelete('cascade');
            $table->boolean('any_option')->nullable();
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
