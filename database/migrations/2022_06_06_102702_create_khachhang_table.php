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
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_tk',20)->unique();
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->string('ho_ten');      
            $table->string('ngay_sinh');
            $table->text('dia_chi');
            $table->integer('sdt');
            $table->integer('trang_thai')->default(0);
            $table->integer('gioi_tinh');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->default(Null);
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
        Schema::dropIfExists('khach_hang');
    }
};
