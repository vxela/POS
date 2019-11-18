<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipment_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shipment_code')->unique();
            $table->enum('shipment_status', ['packing','berangkat', 'terkirim'])->default('packing');
            $table->integer('shipment_vhicle_id');
            $table->integer('driver_id');
            $table->integer('helper_id');
            $table->string('date_shipment');
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
        Schema::dropIfExists('tbl_shipment_details');
    }
}
