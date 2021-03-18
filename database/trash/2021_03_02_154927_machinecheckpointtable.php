<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Machinecheckpointtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MACHINE_SYSTEMPOINTTABLE', function (Blueprint $table) {
      $table->BigInteger('UNID')->primary();
      $table->BigInteger('SYSTEMTABLE_UNID_REF',false,false)->nullable();

      $table->integer('SYSTEMPOINT_TABLE_ID')->nullable();
      $table->string('SYSTEMPOINT_TABLE_NAME',200)->nullable();

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
    Schema::dropIfExists('PMCS_CMMS_MACHINE_SYSTEMPOINTTABLE');
    }
}
