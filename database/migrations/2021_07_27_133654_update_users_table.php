<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('id_unit')->nullable();
            $table->foreign('id_unit')->references('id')->on('unit')
                ->onDelete('cascade');
            $table->string('telephone')->nullable();
            $table->timestamp('birthDay')->nullable();
            $table->boolean('gender')->nullable();
            $table->tinyInteger('nation')->nullable();
            $table->timestamp('date_admission_doan')->nullable();
            $table->timestamp('date_admission_dang_reserve')->nullable();
            $table->timestamp('date_admission_dang_official')->nullable();
            $table->string('current_position')->nullable();
            $table->string('highest_position')->nullable();
            $table->tinyInteger('year')->nullable();
            $table->string('url_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
