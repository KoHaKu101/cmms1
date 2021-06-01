<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class repairreq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_REPAIR_REQ', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();

          $table->BigInteger('MACHINE_UNID')->nullable();
          $table->string('MACHINE_CODE',50)->nullable()->index();

          $table->string('FILE_NAME',200)->nullable();
          $table->string('FILE_EXT',200)->nullable();

          $table->integer('CHECK_YEAR')->nullable()->default(0);
          $table->integer('CHECK_MONTH')->nullable()->default(0);

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
        Schema::dropIfExists('PMCS_CMMS_MACHINE_CHECKSHEET');
    }
}
