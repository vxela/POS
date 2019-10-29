<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fakturs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nota_number');
            $table->integer('customer_id');
            $table->string('order_code');
            $table->date('order_date');
            $table->string('status_pembayaran');
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
        Schema::dropIfExists('tbl_fakturs');
    }
}
