<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_doctor', function (Blueprint $table) {
            $table->bigInteger('doctor_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_doctor');
    }
}
