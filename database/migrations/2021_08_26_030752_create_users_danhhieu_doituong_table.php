<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDanhhieuDoiTuongTable extends Migration
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
            $table->unsignedInteger('id_danhhieu_doituong');
            $table->boolean('confirmed')->default(false);
            $table->text('comment')->nullable();
            $table->text('comment_special')->nullable();
            $table->string('rank')->nullable();
            $table->unsignedBigInteger('id_approved')->nullable();
            $table->unsignedBigInteger('id_user_ranked')->nullable();
            $table->boolean('edit')->default(false);
            $table->timestamps();
            $table->foreign('id_users')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('id_approved')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('id_user_ranked')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('id_danhhieu_doituong')->references('id')->on('danhhieu_doituong')
                ->onDelete('cascade');
            $table->primary(['id_users', 'id_danhhieu_doituong'], 'users_has_danhhieu_doituong');

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
