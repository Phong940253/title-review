<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhhieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhhieu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamp(
                'start')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('finish')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('danhhieu');
    }
}
