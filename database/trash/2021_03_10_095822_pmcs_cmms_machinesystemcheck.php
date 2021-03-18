<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PmcsCmmsMachinesystemcheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MACHINE_SYSTEMCHECK', function (Blueprint $table) {
      $table->BigInteger('UNID')->primary();
      $table->BigInteger('MACHINE_UNID_REF',false,false)->nullable();
      $table->integer('SYSTEM_CODE')->nullable();
      $table->integer('SYSTEM_MONTH')->nullable();
      $table->date('SYSTEM_MONTHCHECK')->nullable();
      $table->date('SYSTEM_MONTHSTORE')->nullable();

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
      Schema::dropIfExists('PMCS_CMMS_MACHINE_SYSTEMCHECK ');
    }
}
