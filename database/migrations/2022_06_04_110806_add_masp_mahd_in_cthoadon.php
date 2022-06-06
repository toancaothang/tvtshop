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
        Schema::table('ct_hoa_don', function (Blueprint $table) {
            $table->unsignedInteger('ma_sp')->after('id');
            $table->foreign('ma_sp')
                  ->references('id')->on('san_pham')
                  ->onDelete('cascade');
                  $table->unsignedInteger('ma_hoa_don')->after('id');
            $table->foreign('ma_hoa_don')
                  ->references('id')->on('hoa_don')
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
        Schema::table('CTHoaDon', function (Blueprint $table) {
            //
        });
    }
};
