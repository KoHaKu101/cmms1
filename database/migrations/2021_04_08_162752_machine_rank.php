<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class machinerank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('PMCS_CMMS_MACHINE_RANK', function (Blueprint $table) {
        $table->BigInteger('UNID')->primary();
        $table->string('MACHINE_RANK_CODE',50)->nullable();
        $table->integer('MACHINE_RANK_MONTH')->nullable();
        $table->integer('MACHINE_RANK_STATUS')->nullable();

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
        Schema::dropIfExists('PMCS_CMMS_MACHINE_RANK');
    }
}
