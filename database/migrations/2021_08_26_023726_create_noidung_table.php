<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noidung', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tieuchuan');
            $table->string('name');
            $table->string('minhchung');
            $table->timestamps();
            $table->foreign('id_tieuchuan')->references('id')->on('tieuchuan')
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
        Schema::dropIfExists('noidung');
    }
}
