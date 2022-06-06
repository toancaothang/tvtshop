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
        Schema::table('binh_luan', function (Blueprint $table) {
            $table->unsignedInteger('ma_kh')->after('noi_dung');
            $table->foreign('ma_kh')
                  ->references('id')->on('khach_hang')
                  ->onDelete('cascade');
                  $table->unsignedInteger('ma_admin')->after('noi_dung');
                  $table->foreign('ma_admin')
                        ->references('id')->on('admin')
                        ->onDelete('cascade');
                        $table->unsignedInteger('ma_sp')->after('noi_dung');
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
        Schema::table('BinhLuan', function (Blueprint $table) {
            //
        });
    }
};
