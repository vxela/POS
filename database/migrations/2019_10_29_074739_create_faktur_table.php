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
            $table->integer('id_pengiriman')->nullable();
            $table->date('order_date');
            $table->integer('order_price');
            $table->enum('status_pembayaran', ['lunas', 'utang', 'belum lunas']);
            $table->integer('sisa_pembayaran')->nullable();
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
