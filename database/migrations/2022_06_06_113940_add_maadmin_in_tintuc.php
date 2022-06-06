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
        Schema::table('tin_tuc', function (Blueprint $table) {
            $table->unsignedInteger('ma_admin')->after('noi_dung');
            $table->foreign('ma_admin')
                  ->references('id')->on('admin')
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
        Schema::table('tin_tuc', function (Blueprint $table) {
            //
        });
    }
};
