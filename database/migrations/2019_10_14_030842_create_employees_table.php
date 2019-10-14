<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_code', 20);
            $table->string('emp_name', 50);
            $table->string('emp_id_number', 16);
            $table->enum('emp_sex', ['L','P']);
            $table->text('emp_address');
            $table->string('emp_phone_number', 13);
            $table->string('emp_religion', 15);
            $table->date('emp_date_in');
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
        Schema::dropIfExists('tbl_employees');
    }
}
