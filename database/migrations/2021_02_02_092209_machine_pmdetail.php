<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class machinepmdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_MACHINE_PM_DEAIL', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('MACHINE_UNID_REF')->nullable();
          $table->BigInteger('MACHINEPM_UNID_REF')->nullable();
          $table->string('MACHINEPM_CHECK_TIME',200)->nullable();
          $table->string('MACHINEPM_CHECK',200)->nullable();
          $table->string('MACHINEPM_FIX',200)->nullable();
          $table->text('MACHINEPM_NOTE',500)->nullable();
          $table->text('MACHINEPM_FAIL_NOTE',500)->nullable();
          $table->text('MACHINEPM_FIX_NOTE',500)->nullable();
          $table->string('MACHINE_USER_CHECK',200)->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_MACHINE_PM_DEAIL');
    }
}
