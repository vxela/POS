<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tbl_shipment_tool', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('jenis_tool', ['Mobil', 'Motor'])->default('Mobil');
            $table->string('tool_name');
            $table->enum('kondisi_tool', ['Baik', 'Rusak', 'Sedang'])->default('Baik');
            $table->text('keterangan_kondisi');
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
        Schema::dropIfExists('Tbl_shipment_tool');
    }
}
