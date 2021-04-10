<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class machinepmdetailstore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_MACHINE_PM_DEAILSTORE', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('MACHINEPM_STORE_UNID_REF')->nullable();

          $table->string('PM_DETAIL_NAME_STORE',200)->nullable();
          $table->string('MACHINEPM_CHECK_STORE',200)->nullable();
          $table->string('MACHINEPM_NOTE_STORE',200)->nullable();
          $table->string('MACHINEPM_FAIL_NOTE_STORE',200)->nullable();
          $table->string('MACHINEPM_FIX_NOTE_STORE',200)->nullable();
          $table->string('MACHINE_USER_CHECK_STORE',200)->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_MACHINE_PM_DEAILSTORE');
    }
}
