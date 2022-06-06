<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anh_tintuc', function (Blueprint $table) {
            $table->unsignedInteger('ma_tintuc')->after('id');
            $table->foreign('ma_tintuc')
                  ->references('id')->on('tin_tuc')
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
        Schema::table('anh_tintuc', function (Blueprint $table) {
            //
        });
    }
};
