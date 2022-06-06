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
        Schema::table('san_pham', function (Blueprint $table) {
            $table->unsignedInteger('ma_danh_muc')->after('ten_sp');
            $table->foreign('ma_danh_muc')
                  ->references('id')->on('danh_muc_sp')
                  ->onDelete('cascade');
                  $table->unsignedInteger('ma_nsx')->after('so_luong');
                  $table->foreign('ma_nsx')
                        ->references('id')->on('nha_sx')
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
        Schema::table('SanPham', function (Blueprint $table) {
            //
        });
    }
};
