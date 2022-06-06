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
        Schema::table('anh_sp', function (Blueprint $table) {
            $table->unsignedInteger('ma_sp')->after('id');
            $table->foreign('ma_sp')
                  ->references('id')->on('san_pham')
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
        Schema::table('AnhSP', function (Blueprint $table) {
            //
        });
    }
};
