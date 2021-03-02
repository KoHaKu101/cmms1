<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Machinechecktable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MACHINE_SYSTEMTABLE', function (Blueprint $table) {
      $table->BigInteger('UNID')->nullable();
      $table->integer('SYSTEM_CODE')->primary();
      $table->string('SYSTEM_NAME',200)->nullable();
      $table->integer('SYSTEM_STATUS')->nullable();
      $table->string('CREATE_BY',200)->nullable();
      $table->string('CREATE_TIME',50)->nullable();
      $table->string('MODIFY_BY',200)->nullable();
      $table->string('MODIFY_TIME',50)->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::dropIfExists('PMCS_CMMS_MACHINE_SYSTEMTABLE');
    }
}
