<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTieuchuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tieuchuan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tieuchi');
            $table->string('name');
            $table->timestamps();
            $table->foreign('id_tieuchi')->references('id')->on('tieuchi')
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
        Schema::dropIfExists('tieuchuan');
    }
}
