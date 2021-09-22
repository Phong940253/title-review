<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_province')->nullable();
            $table->foreign('id_province')->references('id')->on('provinces')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_district')->nullable();
            $table->foreign('id_district')->references('id')->on('districts')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_ward')->nullable();
            $table->foreign('id_ward')->references('id')->on('wards')
                ->onDelete('cascade');

            $table->string('street')->nullable();

            $table->unsignedBigInteger('id_current_province')->nullable();
            $table->foreign('id_current_province')->references('id')->on('provinces')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_current_district')->nullable();
            $table->foreign('id_current_district')->references('id')->on('districts')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_current_ward')->nullable();
            $table->foreign('id_current_ward')->references('id')->on('wards')
                ->onDelete('cascade');

            $table->string('current_street')->nullable();

            $table->unsignedInteger('id_religion')->nullable();
            $table->foreign('id_religion')->references('id')->on('religion')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_province_foreign');
            $table->dropForeign('users_id_district_foreign');
            $table->dropForeign('users_id_ward_foreign');
            $table->dropForeign('users_id_current_province_foreign');
            $table->dropForeign('users_id_current_district_foreign');
            $table->dropForeign('users_id_current_ward_foreign');
            $table->dropForeign('users_id_religion_foreign');
            $table->dropColumn('id_province');
            $table->dropColumn('id_district');
            $table->dropColumn('id_ward');
            $table->dropColumn('street');
            $table->dropColumn('id_current_province');
            $table->dropColumn('id_current_district');
            $table->dropColumn('id_current_ward');
            $table->dropColumn('current_street');
            $table->dropColumn('id_religion');
        });
    }
}
