<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class machinechecksubtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MACHINE_SYSTEMSUBTABLE', function (Blueprint $table) {
      $table->BigInteger('UNID')->nullable();
      $table->integer('SYSTEM_CODE')->nullable();
      $table->integer('SYSTEMSUB_CODE')->primary();
      $table->string('SYSTEMSUB_NAME',200)->nullable();
      $table->integer('SYSTEMSUB_STATUS')->nullable();
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
    Schema::dropIfExists('PMCS_CMMS_MACHINE_SYSTEMSUBTABLE');
    }
}
