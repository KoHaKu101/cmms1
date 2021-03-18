<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detailpointtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MACHINE_DETAILPOINTTABLE', function (Blueprint $table) {
      $table->BigInteger('UNID')->primary();
      $table->BigInteger('SYSTEMPOINTTABLE_UNID_REF',false,false)->nullable();

      $table->integer('DETAILPOINTTABLE_ID')->nullable();
      $table->string('DETAILPOINTTABLE_NAME',200)->nullable();

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
    Schema::dropIfExists('PMCS_CMMS_MACHINE_DETAILPOINTTABLE');
    }
}
