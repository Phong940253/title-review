<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->unsignedBigInteger('id_users');
            $table->unsignedInteger('id_noidung');
            $table->text('reply')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('id_comment')->nullable();
            $table->string('evaluate')->nullable();
            $table->unsignedBigInteger('id_evaluate')->nullable();
            $table->timestamps();
            $table->foreign('id_users')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('id_comment')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('id_evaluate')->references('id')->on('users')
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
        Schema::dropIfExists('replies');
    }
}
