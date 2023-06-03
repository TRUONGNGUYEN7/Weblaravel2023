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
    public $timestamps = true;
    public function up()
    {
        Schema::create('tblbinhluan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khachhang');
            $table->integer('id_sp');
            $table->string('noidung');
            $table->integer('status');
       
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblbinhluan');
    }
};
