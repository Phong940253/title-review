<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDanhhieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_danhhieu_doituong', function (Blueprint $table) {
            $table->unsignedBigInteger('id_users');
            $table->unsignedInteger('id_danhhieu');
            $table->boolean('confirmed')->default(false);
            $table->text('comment');
            $table->boolean('edit')->default(false);
            $table->timestamps();
            $table->foreign('id_users')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('id_danhhieu')->references('id')->on('danhhieu')
                ->onDelete('cascade');
            $table->foreign('id_danhhieu')->references('id')->on('danhhieu')
                ->onDelete('cascade');
            $table->primary(['id_users', 'id_danhhieu'], 'users_has_danhhieu');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_danhhieu_doituong');
    }
}
