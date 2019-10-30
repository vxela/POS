<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tbl_shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nota_id');
            $table->integer('customer_id');
            $table->integer('shipment_status_id');
            $table->integer('shipment_vhicle_id');
            $table->integer('driver_id');
            $table->integer('helper_id');
            $table->string('date_shipment');
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
        Schema::dropIfExists('Tbl_shipments');
    }
}
