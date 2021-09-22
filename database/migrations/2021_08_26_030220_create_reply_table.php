<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply', function (Blueprint $table) {
            $table->unsignedBigInteger('id_users');
            $table->unsignedInteger('id_noidung');
            $table->string('reply');
            $table->timestamps();
            $table->foreign('id_users')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('id_noidung')->references('id')->on('noidung')
                ->onDelete('cascade');

            $table->primary(['id_users', 'id_noidung'], 'users_has_noidung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply');
    }
}
