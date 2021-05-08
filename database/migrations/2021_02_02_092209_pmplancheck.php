<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class pmplancheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_MACHINE_PM_CHECK', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('PM_PLAN_UNID')->nullable();


          $table->date('PLAN_DATE')->nullable();
          $table->BigInteger('MACHINE_PLAN_UNID')->nullable();
          $table->string('MACHINE_CODE')->nullable();
          $table->string('MACHINE_LINE')->nullable();
          $table->string('MACHINE_NAME')->nullable();
          $table->BigInteger('PM_MASTER_UNID')->nullable();
          $table->string('PM_MASTER_NAME')->nullable();
          $table->string('PM_MASTER_DETAIL_NAME')->nullable();
          $table->BigInteger('PM_MASTER_DETAIL_UNID')->nullable();
          $table->string('PM_MASTER_DETAIL_INPUT')->nullable();
          $table->string('PM_MASTER_DETAIL_RESULT')->nullable();
          $table->string('PM_MASTER_STATUS')->nullable();
          $table->string('PM_MASTERPLPAN_REMARK')->nullable();
          $table->string('PM_USER_CHECK')->nullable();
          $table->date('CHECK_DATE')->nullable();


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
        Schema::dropIfExists('PMCS_CMMS_MACHINE_PM_CHECK');
    }
}
