<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitDanhhieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_danhhieu', function (Blueprint $table) {
            $table->unsignedInteger('id_unit');
            $table->unsignedInteger('id_danhhieu');
            $table->timestamps();

            $table->foreign('id_unit')->references('id')->on('unit')
                ->onDelete('cascade');
            $table->foreign('id_danhhieu')->references('id')->on('danhhieu')
                ->onDelete('cascade');
            $table->primary(['id_unit', 'id_danhhieu'], 'unit_has_danhhieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_danhhieu');
    }
}
