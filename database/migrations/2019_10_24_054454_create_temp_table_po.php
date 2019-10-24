<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempTablePo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_temp_pos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nota_id');
            $table->integer('barang_id');
            $table->integer('jml_barang');
            $table->integer('order_price');
            $table->integer('customer_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('tbl_temp_pos');
    }
}
