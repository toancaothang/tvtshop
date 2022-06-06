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
        Schema::create('mau_sp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_mau');
            $table->float('gia_mau');    
            $table->string('cpu');
            $table->integer('ram');
            $table->integer('dung_luong');
            $table->integer('trang_thai')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mau_sp');
    }
};
