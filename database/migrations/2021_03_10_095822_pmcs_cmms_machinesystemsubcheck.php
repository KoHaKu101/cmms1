<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PmcsCmmsMachinesystemsubcheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MACHINE_SYSTEMSUBCHECK', function (Blueprint $table) {
      $table->BigInteger('UNID')->primary();
      $table->BigInteger('SYSTEMCHECK_UNID_REF',false,false)->nullable();
      $table->integer('SYSTEM_CODE')->nullable();
      $table->integer('SYSTEMSUB_CODE')->nullable();
      $table->string('SYSTEMSUB_NAME')->nullable();
      $table->string('SYSTEMSUB_STD',200)->nullable();
      $table->string('SYSTEMSUB_STORE',200)->nullable();
      // $table->date('SYSTEM_MONTHSTORE')->nullable();

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
      Schema::dropIfExists('PMCS_CMMS_MACHINE_SYSTEMSUBCHECK ');
    }
}
