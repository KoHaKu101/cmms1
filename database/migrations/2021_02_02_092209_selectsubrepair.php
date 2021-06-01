<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class selectsubrepair extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PMCS_CMMS_SELECT_SUB_REPAIR', function (Blueprint $table) {
          $table->BigInteger('UNID')->primary();
          $table->BigInteger('REPAIR_MAINSELECT_UNID')->nullable();
          $table->string('REPAIR_SUBSELECT_NAME',500)->nullable()->index();
          $table->integer('REPAIR_SUBSELECT_INDEX')->nullable();
          $table->string('REMARK',500)->nullable();
          $table->integer('STATUS')->nullable()->default(9);
          $table->string('STATUS_MACHINE',50)->nullable();


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
        Schema::dropIfExists('PMCS_CMMS_SELECT_SUB_REPAIR');
    }
}
