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
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->unsignedInteger('ma_kh')->after('id');
            $table->foreign('ma_kh')
                  ->references('id')->on('khach_hang')
                  ->onDelete('cascade');
                  $table->unsignedInteger('ma_admin')->after('id');
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
        Schema::table('HoaDon', function (Blueprint $table) {
            //
        });
    }
};
